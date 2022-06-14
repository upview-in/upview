<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentsController;
use App\Http\Requests\Payment\InitPaymentRequest;
use App\Http\Requests\User\Plans\DetailRequest;
use App\Models\UserOrder;
use App\Models\UserRole;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function list()
    {
        $plans = UserRole::enabled()->get();
        $orders_history = UserOrder::with('plan')->search()->where('user_id', Auth::id())->orderBy('_id', 'desc')->paginate(10);

        return view('user.plans.list', ['plans' => $plans, 'orders_history' => $orders_history]);
    }

    public function details(DetailRequest $request, UserRole $plan)
    {
        $purchased_plans = Auth::user()->roles()->pluck('_id')->toArray();

        return view('user.plans.details', ['plan' => $plan, 'purchased_plans' => $purchased_plans]);
    }

    public function buy(Request $request, UserRole $plan, int $paymentGateway)
    {
        $plan->enabled = $plan->enabled ?? true;

        if ($plan->enabled) {
            $purchased_plans = Auth::user()->roles()->pluck('_id')->toArray();

            if (!in_array($plan->id, $purchased_plans)) {
                $paymentRequest = new InitPaymentRequest();
                $paymentRequest->replace([
                    'plan_id' => $plan->id,
                ]);

                $paymentsController = new PaymentsController();
                if ($paymentGateway === 0) {
                    return $paymentsController->initPaymentStripePaymentGateway($paymentRequest);
                } elseif ($paymentGateway === 1) {
                    return $paymentsController->initRazorPayPaymentGateway($paymentRequest);
                } else {
                    return redirect()->back();
                }
            } else {
                return abort(404);
            }
        } else {
            return abort(404);
        }
    }

    public static function validatePlan()
    {
        $flag = false;
        $expired_role_ids = [];
        $active_orders = UserOrder::with('plan')->where(['user_id' => Auth::id(), 'status' => 1])->get();
        $role_ids = Auth::user()->roles()->pluck('_id')->toArray();

        foreach ($active_orders as $order) {
            if (Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay(1))) {
                $flag = true;

                $order->status = 4;
                $order->save();
                $expired_role_ids[] = $order->plan->id;
            }
        }

        if ($flag) {
            Auth::user()->roles()->sync(array_diff($role_ids, $expired_role_ids));
        }
    }

    public static function getMessage(): array
    {
        $is_any_plans_are_active = false;
        $timeout = 0;
        $display = false;
        $message = 'Your ';
        $expired_plans = $expired_soon_plans = [];
        $active_orders = UserOrder::with('plan')->where('user_id', Auth::id())->whereIn('status', [1, 4])->get();

        foreach ($active_orders as $order) {
            if (!empty($order->plan)) {
                if ($order->status == 4 && Carbon::now()->gte($order->expired_at)) {
                    $display = true;
                    $expired_plans[] = $order->plan->name;
                } elseif ($order->status == 1 && Carbon::now()->gte($order->expired_at->subDays(7))) {
                    $display = true;
                    $expired_soon_plans[] = $order->plan->name;
                } else {
                    $is_any_plans_are_active = true;
                }
            }
        }

        $expired_plans = array_unique($expired_plans);
        $expired_soon_plans = array_unique($expired_soon_plans);

        if (count($expired_soon_plans) > 1) {
            $expired_soon_plans[count($expired_soon_plans) - 1] = 'and ' . $expired_soon_plans[count($expired_soon_plans) - 1];
            $message .= implode(', ', $expired_soon_plans) . ' plans will be expired in 7 days.';
        } else {
            if (!empty($expired_soon_plans)) {
                $message .= $expired_soon_plans[0] . ' plan will be expired in 7 days.';
            }
        }

        $message .= ' ';

        if (count($expired_plans) > 1) {
            $expired_plans[count($expired_plans) - 1] = 'and ' . $expired_plans[count($expired_plans) - 1];
            $message .= implode(', ', $expired_plans) . ' plans are expired.';
        } else {
            if (!empty($expired_plans)) {
                $message .= $expired_plans[0] . ' plan is expired.';
            }
        }

        $message .= ' <a href="' . route('panel.user.plans.list') . '">Active now!</a>';

        if ($is_any_plans_are_active) {
            $timeout = 30;
        }

        return [
            'display' => $display,
            'message' => $message,
            'timeout' => $timeout
        ];
    }
}

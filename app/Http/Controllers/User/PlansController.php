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
use Carbon\CarbonInterface;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function list()
    {
        $plans = UserRole::enabled()->get();

        return view('user.plans.list', ['plans' => $plans]);
    }

    public function orders()
    {
        $orders_history = UserOrder::with('plan')->search()->where('user_id', Auth::id())->orderBy('_id', 'desc')->paginate(10);

        return view('user.plans.orders_receipt', ['orders_history' => $orders_history]);
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
            if (Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay())) {
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
        $is_any_plans_are_active = $can_dismiss = $display = false;
        $message = 'Your ';
        $expired_plans = $expired_soon_plans = [];
        $active_orders = UserOrder::with('plan')->where('user_id', Auth::id())->whereIn('status', [1, 4])->get();

        foreach ($active_orders as $order) {
            if (!empty($order->plan)) {
                if (($order->status === 4 && Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay())) || is_null($order->expired_at)) {
                    $display = true;
                    $expired_plans[] = $order->plan;
                } elseif ($order->status === 1 && Carbon::now()->gte($order->expired_at->subDays(7))) {
                    $display = true;
                    $expired_soon_plans[] = $order->plan;
                } else {
                    $is_any_plans_are_active = true;
                }
            }
        }

        $expired_plans = array_values(array_unique($expired_plans));
        $expired_soon_plans = array_values(array_unique($expired_soon_plans));

        if (!empty($expired_soon_plans)) {
            if (count($expired_soon_plans) > 1) {
                $expired_soon_plans[count($expired_soon_plans) - 1]->name = 'and ' . $expired_soon_plans[count($expired_soon_plans) - 1]->name;
                foreach ($expired_soon_plans as $key => $value) {
                    $message .= $expired_soon_plans[$key]->name . ' (expired at ' . Carbon::now()->diffForHumans($expired_soon_plans[$key]->expired_at ?? Carbon::now()->subDay(), CarbonInterface::DIFF_ABSOLUTE) . ')';
                }
            } else {
                $message .= $expired_soon_plans[0]->name . ' plan will be expired in ' . Carbon::now()->diffForHumans($expired_soon_plans[0]->expired_at ?? Carbon::now()->subDay(), CarbonInterface::DIFF_ABSOLUTE) . '.';
            }
        }

        $message .= ' ';

        // Display popup if there is no any plans are active and if any plans are active then check will be expired soon or not
        if (empty($expired_soon_plans) && !empty($expired_plans) && !$is_any_plans_are_active) {
            if (count($expired_plans) > 1) {
                $expired_plans[count($expired_plans) - 1] = 'and ' . $expired_plans[count($expired_plans) - 1];
                $message .= implode(', ', $expired_plans) . ' plans are expired.';
            } else {
                $message .= $expired_plans[0] . ' plan is expired.';
            }
        }

        $message .= '<a href="' . route('panel.user.plans.list') . '" class="ml-2">View plans!</a>';

        if ($is_any_plans_are_active && !empty($expired_soon_plans)) {
            $display = true;
            $can_dismiss = true;
        }

        return [
            'display' => $display,
            'message' => $message,
            'can_dismiss' => $can_dismiss
        ];
    }
}

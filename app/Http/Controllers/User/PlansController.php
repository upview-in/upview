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
        $filtered_roles_ids = [];
        $active_orders = UserOrder::with('plan')->where(['user_id' => Auth::id(), 'status' => 1])->get();
        $roles_ids = Auth::user()->roles()->pluck('_id')->toArray();

        foreach ($active_orders as $order) {
            if (Carbon::now()->gte($order->expired_at ?? Carbon::now()->subDay(1))) {
                $flag = true;

                $order->status = 4;
                $order->save();
            } else {
                $filtered_roles_ids[] = $order->plan->id;
            }
        }

        if ($flag) {
            Auth::user()->roles()->sync($roles_ids);
        }
    }
}

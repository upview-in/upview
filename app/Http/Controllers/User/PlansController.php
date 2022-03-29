<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Controllers\PaymentsController;
use App\Http\Requests\Payment\InitPaymentRequest;
use App\Http\Requests\User\Plans\DetailRequest;
use App\Models\UserOrder;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Auth;

class PlansController extends Controller
{
    public function list()
    {
        $plans = UserRole::enabled()->get();
        $orders_history = UserOrder::with('plan')->where('user_id', Auth::id())->get();

        return view('user.plans.list', ['plans' => $plans, 'orders_history' => $orders_history]);
    }

    public function details(DetailRequest $request, UserRole $plan)
    {
        return view('user.plans.details', ['plan' => $plan]);
    }

    public function buy(Request $request, UserRole $plan)
    {
        $plan->enabled = $plan->enabled ?? true;

        if ($plan->enabled) {
            $paymentRequest = new InitPaymentRequest();
            $paymentRequest->replace([
                'plan_id' => $plan->id
            ]);

            $paymentsController = new PaymentsController();
            $paymentsController->initPayment($paymentRequest);
        } else {
            return abort(404);
        }
    }
}

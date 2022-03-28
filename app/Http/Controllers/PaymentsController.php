<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\InitPaymentRequest;
use App\Models\UserOrder;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\Stripe;
use Auth;

class PaymentsController extends Controller
{
    public function initPayment(InitPaymentRequest $request)
    {
        $plan = UserRole::find($request->plan_id);

        if (!is_null($plan)) {
            $order = new UserOrder();
            $order->user_id = Auth::id();
            $order->plan_id = $plan->id;
            $order->status = 0;

            if ($order->save()) {
                Stripe::setApiKey(config('stripe.secret'));

                $checkout_session = Session::create([
                    'line_items' => [[
                        'price_data' => [
                            'currency' => 'inr',
                            'product_data' => [
                                'name' => $plan->name,
                                'metadata' => [
                                    'pro_id' => $plan->id,
                                ],
                            ],
                            'unit_amount' => round($plan->price * 100, 2),
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('panel.user.payment.success', $order->id),
                    'cancel_url' => route('panel.user.payment.cancel', $order->id),
                ]);

                return redirect()->to($checkout_session->url)->send();
            } else {
                return abort(500);
            }
        } else {
            return abort(404);
        }
    }

    public function onSuccess(Request $request, UserOrder $order)
    {
        dd($order);
        return;
    }

    public function onCancel(Request $request, UserOrder $order)
    {
        dd($order);
        return redirect()->route('panel.user.plans.list');
    }
}

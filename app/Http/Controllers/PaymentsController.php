<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\InitPaymentRequest;
use App\Models\UserOrder;
use App\Models\UserRole;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

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
                            'currency' => 'usd',
                            'product_data' => [
                                'name' => $plan->name,
                                'metadata' => [
                                    'pro_id' => $plan->id,
                                ],
                            ],
                            'unit_amount' => $this->getAmount($plan->price),
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('panel.user.payment.success', $order->id),
                    'cancel_url' => route('panel.user.payment.cancel', $order->id),
                ]);
                $order->payment_id = $checkout_session->payment_intent;
                $order->update();

                return redirect()->to($checkout_session->url)->send();
            }

            return abort(500);
        }

        return abort(404);
    }

    public function onSuccess(Request $request, UserOrder $order)
    {
        $response = [
            'message' => 'Something wrong!',
            'code' => 'danger',
        ];

        if (Auth::id() === $order->user_id) {
            Stripe::setApiKey(config('stripe.secret'));
            $payment_details = PaymentIntent::retrieve($order->payment_id)->jsonSerialize();
            $plan_details = UserRole::find($order->plan_id);

            if ($order->status !== 1) {
                if (!is_null($plan_details) && $payment_details['status'] === 'succeeded' && $this->getSysAmount($payment_details['amount_received']) === $plan_details->price) {
                    $order->status = 1;
                    $order->purchased_at = Carbon::now();
                    $order->expired_at = Carbon::now()->addDays($plan_details->plan_validity);

                    $roles_ids = Auth::user()->roles()->pluck('_id')->toArray();
                    if (!in_array($plan_details->id, $roles_ids)) {
                        $roles_ids[] = $plan_details->id;
                        Auth::user()->roles()->sync($roles_ids);

                        $response['message'] = 'Plan ' . $plan_details->name . ' successfully purchased. Total $' . $this->getSysAmount($payment_details['amount_received']) . ' amount paid.';
                        $response['code'] = 'success';
                    } else {
                        $response['message'] = 'You\'ve already purchased plan ' . $plan_details->name . '. Total $' . $this->getSysAmount($payment_details['amount_received']) . ' amount paid. <a href="' . route('panel.user.support.submit') . '">Submit</a> your query to support chat for refund.';
                        $response['code'] = 'info';
                    }
                } else {
                    $order->status = 3;

                    $response['message'] = 'Failed to purchase plan ' . $plan_details->name . '. <a href="' . route('panel.user.support.submit') . '">Submit</a> your query if you have trouble to buy.';
                    $response['code'] = 'danger';
                }

                $order->payment_details = $payment_details;
                $order->payment_status = $payment_details['status'];
                $order->update();
            } else {
                $response['message'] = 'Failed to purchase plan ' . $plan_details->name . '. <a href="' . route('panel.user.support.submit') . '">Submit</a> your query if you have trouble to buy.';
                $response['code'] = 'danger';
            }
        } else {
            $response['message'] = 'Order is invalid';
            $response['code'] = 'warning';
        }

        return redirect()->route('panel.user.plans.list')->with('data', $response);
    }

    public function onCancel(Request $request, UserOrder $order)
    {
        if (Auth::id() === $order->user_id) {
            $order->status = 2;
            $order->update();
        }

        return redirect()->route('panel.user.plans.list');
    }

    public static function getAmount(int $price): int
    {
        return round($price * 100);
    }

    public static function getSysAmount(int $price): int
    {
        if ($price === 0) {
            return 0;
        }

        return round($price / 100);
    }
}

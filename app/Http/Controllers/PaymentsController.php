<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\InitPaymentRequest;
use App\Models\UserOrder;
use App\Models\UserRole;
use Auth;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Stripe\Checkout\Session;
use Stripe\PaymentIntent;
use Stripe\Stripe;

class PaymentsController extends Controller
{
    public function initPaymentStripePaymentGateway(InitPaymentRequest $request)
    {
        $plan = UserRole::find($request->plan_id);

        if (!is_null($plan)) {
            $order = new UserOrder();
            $order->payment_gateway_using = 0;
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
                            'unit_amount' => $this->getAmount($plan->price),
                        ],
                        'quantity' => 1,
                    ]],
                    'mode' => 'payment',
                    'success_url' => route('panel.user.payment.stripe.success', $order->id),
                    'cancel_url' => route('panel.user.payment.stripe.cancel', $order->id),
                ]);
                $order->payment_id = $checkout_session->payment_intent;
                $order->update();

                return redirect()->to($checkout_session->url)->send();
            }

            return abort(500);
        }

        return abort(404);
    }

    public function onSuccessOfStripePaymentGateway(Request $request, UserOrder $order)
    {
        $response = [
            'message' => 'Something wrong!',
            'code' => 'danger',
            'response_code' => 6,
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
                        $response['message'] = 'You\'ve already purchased plan ' . $plan_details->name . '. Total $' . $this->getSysAmount($payment_details['amount_received']) . ' amount paid. ' . $this->getSubmitQueryButton('your query to support chat for refund.');
                        $response['code'] = 'info';
                    }
                    $response['response_code'] = 1;
                } else {
                    $response['message'] = 'Failed to purchase plan ' . $plan_details->name . '. ' . $this->getSubmitQueryButton();
                    $response['code'] = 'danger';
                    $response['response_code'] = 3;
                }

                $order->payment_details = $payment_details;
                $order->payment_status = $payment_details['status'];
            } else {
                $response['message'] = 'Failed to purchase plan ' . $plan_details->name . '. ' . $this->getSubmitQueryButton();
                $response['code'] = 'danger';
                $response['response_code'] = 3;
            }
        } else {
            $response['message'] = 'Order is invalid. ' . $this->getSubmitQueryButton();
            $response['code'] = 'warning';
            $response['response_code'] = 6;
        }

        $order->response_message = $response['message'];
        $order->status = (int) $response['response_code'];
        $order->save();

        return redirect()->route('panel.user.plans.list')->with('data', $response);
    }

    public function onCancelOfStripePaymentGateway(Request $request, UserOrder $order)
    {
        if (Auth::id() === $order->user_id) {
            $order->status = 2;
            $order->update();
        }

        return redirect()->route('panel.user.plans.list');
    }

    public function initRazorPayPaymentGateway(InitPaymentRequest $request)
    {
        $plan = UserRole::find($request->plan_id);

        if (!is_null($plan)) {
            $order = new UserOrder();
            $order->payment_gateway_using = 1;
            $order->user_id = Auth::id();
            $order->plan_id = $plan->id;
            $order->status = 0;

            if ($order->save()) {
                $amount = $this->getAmount($plan->price);

                $pg_api = new Api(config('razor-pay.api_key'), config('razor-pay.api_secret'));
                $pg_order = $pg_api->order->create([
                    'receipt'         => 'payment_' . $order->id,
                    'amount'          => $amount,
                    'currency'        => 'INR',
                ]);
                $order->payment_id = $pg_order->id;
                $order->update();

                return view('payment-gateway.razor-pay-checkout', ['order_id' => $order->id, 'payment_id' => $order->payment_id, 'plan' => $plan, 'amount' => $amount, 'plan_price' => $plan->price]);
            }
            abort(500);
        }
        abort(404);
    }

    public function onPaymentCallbackOfRazorPayPaymentGateway(Request $request, UserOrder $order)
    {
        $response = [
            'message' => 'Something wrong!',
            'code' => 'danger',
            'response_code' => 6,
        ];

        if ($request->has(['razorpay_signature', 'razorpay_order_id', 'razorpay_payment_id'])) {
            $pg_api = new Api(config('razor-pay.api_key'), config('razor-pay.api_secret'));
            try {
                $pg_api->utility->verifyPaymentSignature([
                    'razorpay_order_id' => $request->razorpay_order_id,
                    'razorpay_signature' => $request->razorpay_signature,
                    'razorpay_payment_id' => $request->razorpay_payment_id,
                ]);

                if (Auth::id() === $order->user_id) {
                    $plan_details = UserRole::find($order->plan_id);

                    if (!is_null($plan_details)) {
                        if ($order->status !== 1) {
                            $order->purchased_at = Carbon::now();
                            $order->expired_at = Carbon::now()->addDays($plan_details->plan_validity);

                            $roles_ids = Auth::user()->roles()->pluck('_id')->toArray();
                            if (!in_array($plan_details->id, $roles_ids)) {
                                $roles_ids[] = $plan_details->id;
                                Auth::user()->roles()->sync($roles_ids);

                                $response['message'] = 'Plan ' . $plan_details->name . ' successfully purchased.';
                                $response['code'] = 'success';
                            } else {
                                $response['message'] = 'You\'ve already purchased plan ' . $plan_details->name . '. ' . $this->getSubmitQueryButton('your query to support chat for refund.');
                                $response['code'] = 'info';
                            }
                            $response['response_code'] = 1;
                        } else {
                            $response['message'] = 'Failed to purchase plan ' . $plan_details->name . '. ' . $this->getSubmitQueryButton();
                            $response['code'] = 'danger';
                            $response['response_code'] = 3;
                        }
                    } else {
                        $response['message'] = 'Failed to purchase plan. ' . $this->getSubmitQueryButton();
                        $response['code'] = 'danger';
                        $response['response_code'] = 3;
                    }
                } else {
                    $response['message'] = 'Order is invalid. ' . $this->getSubmitQueryButton();
                    $response['code'] = 'warning';
                    $response['response_code'] = 6;
                }
            } catch (SignatureVerificationError $e) {
                $response['message'] = 'Payment signature is invalid. ';
                $response['code'] = 'warning';
                $response['response_code'] = 5;
            }
        }

        $order->payment_details = $request->all();
        $order->response_message = $response['message'];
        $order->status = (int) $response['response_code'];
        $order->save();

        return redirect()->route('panel.user.plans.list')->with('data', $response);
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

    public function getSubmitQueryButton($message = null): string
    {
        return '<a href="' . route('panel.user.support.submit') . '">Submit</a> ' . is_null($message) ? 'your query if you have trouble to buy.' : $message;
    }
}

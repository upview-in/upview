<?php

namespace App\Http\Controllers;

use App\Http\Requests\Payment\InitPaymentRequest;
use Cartalyst\Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentsController extends Controller
{
    public function initPayment(InitPaymentRequest $request)
    {
        Stripe::make(config('stripe.secret'));

        $checkout_session = Session::create([
            'line_items' => [[
                'price' => '',
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route(''),
            'cancel_url' => route(''),
        ]);

        return redirect()->away($checkout_session->url);
    }
}

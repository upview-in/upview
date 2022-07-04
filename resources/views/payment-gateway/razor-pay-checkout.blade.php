<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pay</title>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <style type="text/css">
        .razorpay-payment-button {
            margin: 0;
            position: absolute;
            top: 50%;
            left: 50%;
            -ms-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <form action="{{ route('panel.user.payment.razor-pay.callback', $order_id) }}" method="POST" id="payForm">
        @csrf
        <script
            src="https://checkout.razorpay.com/v1/checkout.js"
            data-key="{{ config('razor-pay.api_key') }}"
            data-amount="{{ $amount }}"
            data-currency="INR"
            data-name="{{ config('app.name') }}"
            data-image="{{ asset('images/logo/logo.svg') }}"
            data-order_id="{{ $payment_id }}"
            data-display_amount="{{ $plan_price }}"
            data-display_currency="INR"
            data-prefill.name="{{ Auth::user()->name }}"
            data-prefill.email="{{ Auth::user()->email }}"
            data-prefill.contact="{{ Auth::user()->mobile_number }}">
        </script>
    </form>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#payForm").submit();
        });
    </script>
</body>
</html>
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('vendor/phone-number/css/intlTelInput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-app.min.css') }}" rel="stylesheet">

    <style>
        .iti {
            display: block;
        }

        .input-affix .prefix-icon, .input-affix .suffix-icon {
            z-index: 1;
        }
    </style>

    @yield('custom-styles')
</head>

<body>
    <div class="app">
        {{ $slot }}
    </div>

    <!-- Core Vendors JS -->
    <script src="{{ asset('js/theme-vendors.min.js') }}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('js/theme-app.min.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/utils.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/data.min.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/intlTelInput-jquery.min.js') }}"></script>

    <script>
        $(document).ready(function() {
            if ($("#phoneNumber").length) {
                var telInputErrorMap = ["Invalid number", "Invalid country code", "Too short", "Too long", "Invalid number"];
                $("#phoneNumber").intlTelInput({
                    placeholderNumberType: "MOBILE",
                    initialCountry: "auto",
                });

                $('form').submit(function (e) {
                    if ($(this).find("#phoneNumber").length) {
                        if ($("#phoneNumber").intlTelInput("isValidNumber") !== true) {
                            let error_msg = $("#phoneNumber").intlTelInput("getValidationError");
                            if (error_msg < 0) {
                                toast('Error', 'Phone Number is invalid', 3000, 'danger', 'danger');
                            } else {
                                toast('Error', telInputErrorMap[error_msg], 3000, 'danger', 'danger');
                            }
                            e.preventDefault();
                        } else {
                            var phone_number = $("#phoneNumber").intlTelInput("getNumber");
                            $("#phoneNumber").val(phone_number);
                        }
                    }
                });
            }
        });
    </script>

    @yield('custom-scripts')

</body>

</html>
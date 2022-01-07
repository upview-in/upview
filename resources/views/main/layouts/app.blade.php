<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Upview</title>
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images/logo/favicon.svg') }}" />
        <!--  Minified  css  -->
        <!--  # vendor min css,plugins min css,style min css -->
        <link rel="stylesheet" href="{{ asset('main/css/vendor/vendor.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/plugins/plugins.min.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/plugins/aos.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/plugins/selectric.css') }}" />
        <link rel="stylesheet" href="{{ asset('main/css/style.min.css') }}" />
    </head>
    <body>
        @include('main.layouts.offcanvas')
        @include('main.layouts.header')

        <!-- Content goes Here -->
        {{ $slot }}

        @include('main.layouts.footer')
        <!-- Scripts -->
        <!-- #  Minified  js  -->
        <!-- vendor,plugins and main js -->

        <script src="{{ asset('main/js/vendor/vendor.min.js') }}"></script>
        <script src="{{ asset('main/js/plugins/plugins.min.js') }}"></script>
        <script src="{{ asset('main/js/ajax-contact.js') }}"></script>
        <script src="{{ asset('main/js/plugins/aos.js') }}"></script>
        <script src="{{ asset('main/js/plugins/waypoints.js') }}"></script>
        <script src="{{ asset('main/js/plugins/jquery.selectric.min.js') }}"></script>
        <script src="{{ asset('main/js/main.min.js') }}"></script>
    </body>
</html>
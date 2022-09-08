<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset=" utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ ($title ?? 'Dashboard') . ' - ' . config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }}">

    <!-- page css -->

    <!-- Core css -->
    <link href="{{ asset('vendor/bootstrap-table/dist/bootstrap-table.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/select2/select2.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/phone-number/css/intlTelInput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/driver.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/theme-app.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-confirm.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        .icon-holder em {
            margin-right: 14px;
            font-size: 18px;
            font-weight: bolder;
        }

        .iti {
            display: block;
        }

        .statusbar-danger {
            width: 100%;
            width: -moz-available;
            margin-top: 70px;
            padding: 4px;
            padding-left: 12px;
            position: fixed;
            background-color: #ff5f2e;
            color: white;
            font-weight: 600;
            z-index: 100;
        }

        .statusbar-danger a {
            color: #000000;
        }

        .statusbar-danger em {
            cursor: pointer;
        }

        .main-content-statusbar-danger {
            padding: calc(70px + 32px + 25px) 25px 25px !important;
            min-height: calc(100vh - (70px + 32px)) !important;
        }
    </style>

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
        var _smartsupp = _smartsupp || {};
        _smartsupp.key = 'd5e6c35d6d5031a94025f0964a9f012a8a5e9e32';
        window.smartsupp||(function(d) {
          var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
          s=d.getElementsByTagName('script')[0];c=d.createElement('script');
          c.type='text/javascript';c.charset='utf-8';c.async=true;
          c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
        })(document);
    </script>

    @yield('custom-css')
</head>

<body>
    <div class="app">
        <div class="layout">
            @include('layouts.navigation')
            @include('layouts.sidebar')

            <!-- Page Container START -->
            <div class="page-container">

                @if (!empty($planStatus['display']))
                    <div class="statusbar-danger d-flex align-items-center">
                        {!! $planStatus['message'] !!}
                        @if (!empty($planStatus['can_dismiss']))
                            <em class="fa fa-times float-right ml-auto mr-3" id="dismiss_statusbar" onclick="$(this).parent().attr('style','display:none !important');"></em>
                        @endif
                    </div>
                @endif

                <!-- Content Wrapper START -->
                <div @class([
                        'main-content',
                        'main-content-statusbar-danger' => $planStatus['display']
                    ])>
                    @if ($pageHeader ?? true === true)
                        <div class="page-header">
                            <h2 class="header-title">{{ $title ?? 'Dashboard' }}</h2>
                            <div class="header-sub-title">
                                <nav class="breadcrumb breadcrumb-dash">
                                    <a href="{{ route('panel.dashboard') }}" class="breadcrumb-item"><em
                                            class="anticon anticon-home m-r-5"></em>Home</a>
                                    @yield('path-navigation')
                                </nav>
                            </div>
                        </div>
                    @endif

                    <!-- Content goes Here -->
                    {{ $slot }}

                </div>
                <!-- Content Wrapper END -->

                @include('layouts.footer')

            </div>
            <!-- Page Container END -->

            <!-- Search Start-->
            <div class="modal modal-left fade search" id="search-drawer">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Search</h5>
                            <button type="button" class="close" data-dismiss="modal">
                                <em class="anticon anticon-close"></em>
                            </button>
                        </div>
                        <div class="modal-body scrollable">
                            <div class="input-affix">
                                <em class="prefix-icon anticon anticon-search"></em>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Search End-->

            <!-- Quick View START -->
            <div class="modal modal-right fade quick-view" id="quick-view">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header justify-content-between align-items-center">
                            <h5 class="modal-title">Quick View</h5>
                        </div>
                        <div class="modal-body scrollable">
                            <!-- Content goes Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Quick View END -->
        </div>
    </div>

    <!-- Show Toast -->
    <div class="notification-toast bottom-right" id="notification-toast"></div>

    <!-- Div Loader -->
    <div class="d-none div-loader justify-content-center align-items-center" id="divLoadingTemplate">
        <img src="{{ asset('images/others/div-loader.gif') }}" height="60px" width="auto" alt="" />
    </div>

    <!-- Core Vendors JS -->
    <script src="{{ asset('js/theme-vendors.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>

    <!-- page js -->

    <!-- Core JS -->
    <script src="{{ asset('js/theme-app.min.js') }}"></script>
    <script src="{{ asset('js/jquery-confirm.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js') }}"></script>
    <script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
    <script src="{{ asset('vendor/country-list/country-list.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap-table/dist/bootstrap-table.min.js') }}"></script>
    <script src="{{ asset('vendor/jsPDF/jspdf.umd.min.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/utils.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/data.min.js') }}"></script>
    <script src="{{ asset('vendor/phone-number/js/intlTelInput-jquery.min.js') }}"></script>
    <script src="{{ asset('js/driver.min.js') }}"></script>
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        var videoIntelligenceIndexRoute = "{{ route('panel.user.measure.market_research.video_intelligence.index') }}";
    </script>
    <script src="{{ asset('js/app.js') }}"></script>

    @yield('custom-scripts')

</body>

</html>

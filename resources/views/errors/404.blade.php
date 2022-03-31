<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upview</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/favicon.svg') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/favicon.svg') }} ">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }} ">
    <!-- metatag -->
    <meta name="author" content="Upview" />
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/responsive.css') }}">
</head>

<body>
    <!-- floating navigation -->
    <!-- header -->
    <header id="wrap-header" class="pt-3">
        <div class="container pl-lg-0">
            <div class="row position-relative">
                <div class="col-lg-12">
                    <div class="wrap-logo">
                        <a class="navbar-brand" href="#header">
                            <span class="d-inline">
                                <img src="{{ asset('images/logo/named_logo_white.png') }}" height="100" width="auto" alt="Upview">
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main wrap page -->
    <main>
        <div class="o-line"></div>
        <div class="o-line"></div>
        <div class="o-line"></div>
        <div class="scene"></div>
        <!-- hero -->
        <section id="home" class="sect section1" data-section-name="home">

            <div class="container">
                <div class="row">
                    <div class="col-lg-7 align-items-center justify-content-left d-flex vh-100">
                        <div class="wrap-heroifo gl pb-4 pt-5">
                            <h1 class="text-danger" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size: 2in">404</h1>
                            <h2 style="font-family:Georgia, 'Times New Roman', Times, serif;">&nbsp;&nbsp;&nbsp;PAGE NOT FOUND</h2>
                            <a href="https://{{ env('MAIN_DOMAIN') }}" class="btn button mt-2" style="padding: 15px 140px;">Go Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end hero -->
    </main>
    <!-- end main wrap page -->
    <!-- footer -->
    <footer id="footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-3">
                    <p>Upview India</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="glasseffect"></div>
    <!-- bootstrap js -->
    <script src="{{ asset('main/javascript/vendor/bootstrap.js') }}"></script>
    <!-- three js module -->
    <script type="module" src="{{ asset('main/javascript/vendor/auora.js') }}"></script>
    <!-- titlt js -->
    <script src=" {{ asset('main/javascript/vendor/titlt.js') }}"></script>
    <!-- glightbox js -->
    <script src=" {{ asset('main/javascript/vendor/glightbox.js') }}"></script>
    <!-- owl  js -->
    <script src=" {{ asset('main/javascript/vendor/keen-slider.js') }}"></script>
    <!-- aos js -->
    <script src=" {{ asset('main/javascript/vendor/aos.js') }}"></script>
    <!-- main js -->
    <script src=" {{ asset('main/javascript/main.js') }}"></script>
</body>

</html>
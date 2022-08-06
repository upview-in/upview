<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Upview</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('main/assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap-select.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/custom-animate.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/fancybox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/imp.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/scrollbar.css') }}">

    <!-- Module css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/header-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/banner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/about-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/blog-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/fact-counter-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/faq-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/contact-page.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/breadcrumb-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/team-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/partner-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/testimonial-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/services-section.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/footer-section.css') }}">

    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('main/assets/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main/assets/images/favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favico.svg') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favico.svg') }}" sizes="16x16" />

    {!! NoCaptcha::renderJs() !!}

</head>

<body>

    <div class="boxed_wrapper ltr">

        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader">
            </div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch"><button class="rtl">RTL</button></div>
            <div class="demo-ltr direction_switch"><button class="ltr">LTR</button></div>
        </div>
        <!-- page-direction end -->


        <!-- Main header-->
        <header class="main-header header-style-three">
            <!--Start Header-->
            <div class="header-three clearfix">
                <div class="auto-container clearfix">
                    <div class="outer-box clearfix">
                        <div class="header-three_left">

                            <div class="logo">
                                <a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="
									161px" height="60px" alt="Awesome Logo" title="" /></a>
                            </div>

                            <div class="nav-outer style3 clearfix">
                                <!--Mobile Navigation Toggler-->
                                <div class="mobile-nav-toggler">
                                    <div class="inner">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </div>
                                </div>
                                <!-- Main Menu -->
                                <nav class="main-menu style3 navbar-expand-md navbar-light">
                                    <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                        <ul class="navigation clearfix">
                                            <li><a href="{{ route('main.index') }}">Home</a></li>
                                            <li><a href="{{ route('main.videos') }}">Videos</a></li>
                                            <li class="dropdown">
                                                <a href="#">Solutions</a>
                                                <ul>
                                                    <li>
                                                        <a href="{{ route('main.socialAnalytics') }}">Social Media Analytics</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('main.socialPosting') }}">Social Media Posting</a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('main.socialListening') }}">Social Listening</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li><a href="{{ route('main.pricing') }}">Pricing</a></li>
                                            <li class="current"><a href="{{ route('main.contact') }}">Contact Us</a></li>
                                            <li><a href="{{ route('login') }}">Login</a></li>
                                        </ul>
                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                            </div>

                        </div>

                        <div class="header-three_right">
                            <div class="btns-box">
                                <a class="btn-one" href="{{ route('register') }}">
                                    <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--End header-->

            <!--Sticky Header-->
            <div class="sticky-header">
                <div class="container">
                    <div class="clearfix">
                        <!--Logo-->
                        <div class="logo float-left">
                            <a href="{{ route('main.index') }}" class="img-responsive"><img alt="" src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" title=""></a>
                        </div>
                        <!--Right Col-->
                        <div class="right-col float-right">
                            <!-- Main Menu -->
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
                            <a class="btn-one ml-4 m-4" href="{{ route('register') }}">
                                <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Sticky Header-->

            <!-- Mobile Menu  -->
            <div class="mobile-menu">
                <div class="menu-backdrop"></div>
                <div class="close-btn"><span class="icon fa fa-times-circle"></span></div>
                <nav class="menu-box">
                    <div class="nav-logo"><a href="{{ route('main.index') }}"><img alt="" src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="150px" height="50px" alt="" title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <a class="btn-one ml-4 m-4" href="{{ route('login') }}">
                        <span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
                    </a>
                    <!--Social Links-->
                    <div class="social-links">
                        <ul class="clearfix">
                            <li><a href="https://www.facebook.com/upviewIndia/"><span class="fab fa fa-facebook-square"></span></a></li>
                            <li><a href="https://twitter.com/upview_in"><span class="fab fa fa-twitter-square"></span></a></li>
                            <li><a href="https://www.linkedin.com/showcase/upview-india"><span class="fab fa fa-linkedin-square"></span></a></li>
                            <li><a href="https://instagram.com/upview.in"><span class="fab fa fa-instagram-square"></span></a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- End Mobile Menu -->
        </header>


        <!--Start breadcrumb area-->
        <section class="breadcrumb-area">
            <div class="breadcrumb-area-bg" style="background-image: url({{ asset('main/assets/images/breadcrumb/Service_Banner.png') }} );">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content text-center">
                            <div class="title paroller">
                                <h2>Contact Us</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Contact Style1 Area-->
        <section class="contact-style1-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="contact-style1_inner-box">

                            <div class="contact-style1_form">
                                <div class="top-title">
                                    <h3>Leave A Comment!</h3>
                                </div>
                                <div class="contact-form">
                                    <form method="POST" name="contact_form" class="default-form2" action="{{ route('main.contact-us') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <label>Full Name</label>
                                                    <input type="text" id="name" name="name" value="" placeholder="Full Name :" required="">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <label>Email</label>
                                                    <input type="email" id="email" name="email" value="" placeholder="Email :" required="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <label>Phone</label>
                                                    <input type="text" id="mobile_number" name="mobile_number" value="" placeholder="Phone :">
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="input-box">
                                                    <label>Subject</label>
                                                    <input type="text" id="subject" name="subject" value="" placeholder="Subject :">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="input-box">
                                                    <label>Message</label>
                                                    <textarea id="message" name="message" placeholder="Enter your message..." required=""></textarea>
                                                </div>

                                                {!! NoCaptcha::display() !!}
                                                @error('g-recaptcha-response')
                                                <span class="invalid-feedback d-block" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror

                                                <div class="button-box">
                                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="">
                                                    <button class="btn-one" type="submit" data-loading-text="Please wait...">
                                                        <span class="border_line"><img src="{{ asset('main/assets/images/shape/button-border.png') }}" alt=""></span>
                                                        <span class="left_round"></span>
                                                        <span class="right_round"></span>
                                                        <span class="txt">Send Message<iclass="flaticon-plus-1 plusicon"></i></span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                    </form>
                                </div>
                            </div>

                            <div class="contact-info-sidebar">
                                <ul>
                                    <li>
                                        <div class="inner">
                                            <div class="inner_title">
                                                <h3>Address</h3>
                                            </div>
                                            <div class="inner_text">
                                                <p style="margin-left: 20px;"> Workafella, AK Estate, Off Veer
                                                    Savarkar
                                                    Flyover,Besides Radisson Blu Hotel, SV Road,Goregaon West,
                                                    Mumbai, Maharashtra 400062. India</p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="inner">
                                            <div class="inner_title">
                                                <h3>Telephone</h3>
                                            </div>
                                            <div class="inner_text">
                                                <p><a href="tel:+919820909500">+91 9820909500</a></p>
                                            </div>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="inner">
                                            <div class="inner_title">
                                                <h3>E-mail</h3>
                                            </div>
                                            <div class="inner_text">
                                                <p><a href="mailto:info@upview.in" class="underline">info@upview.in</a>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="inner">
                                            <div class="inner_title">
                                                <h3>Social</h3>
                                            </div>
                                            <div class="inner_text">
                                                <ul class="social-link">
                                                    <li><a href="https://www.facebook.com/upviewIndia/"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="https://twitter.com/upview_in"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="https://instagram.com/upview.in"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="https://instagram.com/upview.in"><i class="fa fa-linkedin"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!--End Contact Style1 Area-->

        <!--Start Google map area-->
        <section class="google-map-area">
            <div class="container-fluid">
                <div class="row" style="margin-top: -120px;">
                    <div class="col-xl-12">
                        <div class="contact-page-map-outer">
                            <!--Map Canvas-->
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.496550277191!2d72.84424901529549!3d19.173502653881936!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7b73af6b128cb%3A0x1d24311954e4e8e8!2sWorkafella%20Goregaon%20-%20Coworking%20Space%20in%20Mumbai!5e0!3m2!1sen!2sin!4v1653113527046!5m2!1sen!2sin" width="100%" height="650" style="border:0;" title="Location Map" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Start Google map area-->


        <!--Start footer area -->
        <footer class="footer-area style2 mt-5">
            <div class="shape">
                <img alt="" src="{{ asset('main/assets/images/shape/thm-shape-4.png') }}" alt="" />
            </div>
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="inner">
                                <div class="text">
                                    <h6>Ready to get started?</h6>
                                    <h4 style="color: #fff;">Book a demo to explore UPVIEW’s powerful Publishing, Analytics, and Social Listening tools.</h4>
                                </div>
                                <div class="button-box">
                                    <a class="btn-one" href="{{ route('main.contact') }}">
                                        <div class="border_line">
                                            <img alt="" src="{{ asset('main/assets/images/shape/button-border.png') }}" alt="" />
                                        </div>
                                        <div class="left_round"></div>
                                        <div class="right_round"></div>
                                        <span class="txt">Book a Demo<i class="flaticon-plus-1 plusicon"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Start Footer-->
            <div class="footer">
                <div class="container">
                    <div class="row text-right-rtl">
                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.1s">
                            <div class="single-footer-widget">
                                <div class="our-company-info">
                                    <div class="footer-logo">
                                        <a href="{{ route('main.index') }}">
                                            <img alt="" src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" /></a>
                                    </div>
                                    <div class="text-box">
                                        <p style="font-size: 19px;">
                                            We help transform relevant information into desired results.
                                        </p>
                                    </div>
                                    <div class="copyright-text style2">
                                        <p>
                                            &copy; Copywright <a href="#">@Neomobile Advertising LLP.</a> All
                                            Rights Reserved.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.3s">
                            <div class="single-footer-widget mar-left pdtop60 pdtop0" style="margin-left: 40px;">
                                <div class="title">
                                    <h3>Categories</h3>
                                </div>
                                <ul class="footer-widget-links1">
                                    <li><a href="{{ route('main.index') }}">Home</a></li>
                                    <li><a href="{{ route('main.socialAnalytics') }}">Social Media Analytics</a></li>
                                    <li><a href="{{ route('main.socialPosting') }}">Social Media Posting</a></li>
                                    <li><a href="{{ route('main.socialListening') }}"> Social Listening</a></li>
                                    <li><a href="{{ route('main.contact') }}">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-2 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.5s">
                            <div class="single-footer-widget mar-left2 pdtop60">
                                <div class="title">
                                    <h3>Community</h3>
                                </div>
                                <ul class="footer-widget-links1">
                                    <li><a href="javascript:void();">Blog</a></li>
                                    <li><a href="javascript:void();">Members</a></li>
                                </ul>
                            </div>
                        </div>
                        <!--End single footer widget-->

                        <!--Start single footer widget-->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 wow animated fadeInUp" data-wow-delay="0.7s">
                            <div class="single-footer-widget fixwidth pdtop60">
                                <div class="title">
                                    <h3>Our Socials</h3>
                                </div>
                                <ul class="instagram-box">
									<li>
										<div class="img-holder">
											<div>
												<div class="inner">
													<a href="https://instagram.com/upview.in"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<div>
												<div class="inner">
													<a href="https://www.facebook.com/upviewIndia/"><i class="fa fa-facebook" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<div>
												<div class="inner">
													<a href="https://www.linkedin.com/showcase/upview-india"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<div>
												<div class="inner">
													<a href="https://youtube.com/channel/UCyfrXeg5UCAHgth9k_1vBYA"><i class="fa fa-youtube" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<div>
												<div class="inner">
													<a href="https://twitter.com/upview_in"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
								</ul>

                                <div class="bottom-box">
                                    <ul>
                                        <li><a href="{{ route('main.privacy-policy') }}">Privacy</a></li>
                                        <li><a href="{{ route('main.terms-conditions') }}">Terms & Conditions </a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End Footer-->
        </footer>
        <!--End footer area-->




        <button class="scroll-top scroll-to-target" data-target="html">
            <span class="fa fa-angle-up"></span>
        </button>



    </div>



    <script src="{{ asset('main/assets/js/jquery.js') }}"></script>
    <script src="{{ asset('main/assets/js/aos.js') }}"></script>
    <script src="{{ asset('main/assets/js/appear.js') }}"></script>
    <script src="{{ asset('main/assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.enllax.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.fancybox.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery.paroller.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('main/assets/js/knob.js') }}"></script>
    <script src="{{ asset('main/assets/js/map-script.js') }}"></script>
    <script src="{{ asset('main/assets/js/owl.js') }}"></script>
    <script src="{{ asset('main/assets/js/pagenav.js') }}"></script>
    <script src="{{ asset('main/assets/js/parallax.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/scrollbar.js') }}"></script>
    <script src="{{ asset('main/assets/js/TweenMax.min.js') }}"></script>
    <script src="{{ asset('main/assets/js/validation.js') }}"></script>
    <script src="{{ asset('main/assets/js/wow.js') }}"></script>

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyATY4Rxc8jNvDpsK8ZetC7JyN4PFVYGCGM&callback=initMap">
    </script>


    <!-- thm custom script -->
    <script src="{{ asset('main/assets/js/custom.js') }}"></script>



</body>

</html>
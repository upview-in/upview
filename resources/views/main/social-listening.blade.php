<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Upview</title>

    <!-- responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- For IE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('main/assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/aos.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/fancybox.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/flaticon.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/imp.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/owl.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/scrollbar.css') }}" />

    <!-- Module css -->
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/header-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/banner-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/about-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/blog-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/fact-counter-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/faq-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/contact-page.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/breadcrumb-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/team-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/partner-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/testimonial-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/services-section.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/module-css/footer-section.css') }}" />

    <link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/assets/css/responsive.css') }}" />
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main/assets/images/favicon/apple-touch-icon.png') }}" />
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favicon-32x32.png') }}" sizes="32x32" />
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favicon-16x16.png') }}" sizes="16x16" />

</head>

<body>
    <div class="boxed_wrapper ltr">
        <!-- Preloader -->
        <div class="loader-wrap">
            <div class="preloader"></div>
            <div class="layer layer-one"><span class="overlay"></span></div>
            <div class="layer layer-two"><span class="overlay"></span></div>
            <div class="layer layer-three"><span class="overlay"></span></div>
        </div>

        <!-- page-direction -->
        <div class="page_direction">
            <div class="demo-rtl direction_switch">
                <button class="rtl">RTL</button>
            </div>
            <div class="demo-ltr direction_switch">
                <button class="ltr">LTR</button>
            </div>
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
                                            <li class="dropdown current">
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
                                            <li><a href="{{ route('main.contact') }}">Contact Us</a></li>
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
                            <a href="{{ route('main.index') }}" class="img-responsive"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" title=""></a>
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
                    <div class="nav-logo"><a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="150px" height="50px" alt="" title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
                    <a class="btn-one ml-4 m-4" href="{{ route('register') }}">
                        <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
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
        <section class="breadcrumb-area breadcrumb-area-style2">
            <div class="breadcrumb-area-bg" style="background-image: url({{ asset('main/assets/images/breadcrumb/Social_Media_Listening.png') }} );">
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content paroller text-center">
                            <div class="title">
                                <h2 style="font-size: 50px;" id="randomHeadLine"></h2><br />
                                <h4 style="font-weight: 400; color: #fff;" id="randomTagLine"></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!--Start Service Details Area-->
        <section class="service-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="service-deails-box">
                            <div class="shape1">
                                <img src="{{ asset('main/assets/images/shape/thm-shape-5.png') }} " alt="" />
                            </div>
                            <div class="bg-shape"></div>
                            <div class="service-details-content-box">
                                <div class="text">
                                    <h3>
                                        Social is about engaging with your audience. And it starts with listening.
                                    </h3>
                                    <div class="mt-5">
                                        <p>
                                            Conversations move at light speed on social media platforms. Whether you are an
                                            influencer or an agency managing multiple brands, it is mission-critical to stay on
                                            top of the conversations on social media daily. UPVIEW’s cutting-edge social
                                            listening tool crawls millions of pages to churn out real-time insights that give you
                                            the competitive edge to win on social media.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="service-details-image-box">
                                <img src="{{ asset('main/assets/images/breadcrumb/Social_Media_Listening-Small.png') }} " alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Service Details Area-->

        <!--Start SKill style1 Area-->
        <section class="service-style3-area">
            <div class="container">
                <div class="sec-title text-center">
                    <div class="sub-title">
                        <h3>Features</h3>
                    </div>
                    <h2>
                        Listen, analyze, and respond<br /> to social conversations.
                    </h2>
                </div>
                <div class="row">
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/setup.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#Intuitive-setup">Intuitive setup</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Setting up social listening is as simple as adding keywords. You specify the date range and track social networks like Twitter, Facebook, Instagram, YouTube, Vimeo, and Reddit, as well as news sources, blogs, and websites.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/track-competitors.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#track-competitors">Track competitors</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        You can set up social listening for competitor brands on UPVIEW. Our algorithm crawls the web to provide real-time updates and a comparative analysis of how your brand is faring as opposed to the competition.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/get-context.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#get-the-context">Get the context</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        UPVIEW analyzes updates and churns out a topic cloud that gives you the context in which your brands are mentioned. It breaks down mentions by age and gender, helping you build a deeper understanding of your audience.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/sentiment.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#sentiment-analysis">Sentiment analysis</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        UPVIEW’s advanced algorithms discern sentiments expressed in updates. When you know how your consumers feel about your brand, you can proactively address their needs – earning their trust and loyalty.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/influencer.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#evaluate-influencers">Evaluate Influencers</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Our Social Listening dashboard presents you with a list of influencers and websites driving sentiments around your brand. This allows brands to initiate conversations with those sources and fine-tune promotional campaigns to maximize their ROI.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/listening/reports.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
                                    <a href="{{ route('main.socialListeningInner') }}#generate-reports">Generate reports</a>
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Tuning into online conversations has implications not just for your social media
                                        strategy, but also for CRM and PR. Align your teams with easy-to-create reports. Our
                                        widget-based system makes customization easy as you drag and drop relevant data
                                        points.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End Single Service Style3-->
                </div>
            </div>
        </section>
        <!--End SKill style1 Area-->

        <!--Start footer area -->
        <footer class="footer-area style2">
            <div class="shape">
                <img src="{{ asset('main/assets/images/shape/thm-shape-4.png') }}" alt="" />
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
                                            <img src="{{ asset('main/assets/images/shape/button-border.png') }}" alt="" />
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
                                            <img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" /></a>
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
                                    <li><a href="{{ route('main.socialListening') }}">Social Listening</a></li>
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

    <!-- thm custom script -->
    <script src="{{ asset('main/assets/js/custom.js') }}"></script>
    <script>
        $(document).ready(function() {
            var headline = [
                "Strengthen your brand with sentiment analysis"
            ];

            var bottomTaglines = [
                "Powerful social listening tools to tune in to audience conversations that help you grow your brand."
            ];

            $("#randomHeadLine").html(headline[Math.floor(Math.random() * headline.length)]);
            $("#randomTagLine").html(bottomTaglines[Math.floor(Math.random() * bottomTaglines.length)]);
        });
    </script>
</body>

</html>
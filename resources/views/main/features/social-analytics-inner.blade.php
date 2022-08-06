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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet" />

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
    <!-- Custom Placeholder CSS -->
    <link rel="stylesheet" href="{{ asset('main/assets/customstyle.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css"
        integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"
        integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
        <section class="breadcrumb-area">
            <div class="breadcrumb-area-bg"
                style="background-image: url( {{ asset('main/assets/images/breadcrumb/Social_Media_Analytics.png') }} );"></div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content paroller text-center">
                            <div class="title">
                                <h2 style="font-size: 50px;">Social Media Analytics</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->


        <!-- Audience profile section -->
        <section id="audience-profile" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Build your audience profile</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Geo Location
                        </h3>
                        <p class="pr-docs">Build content and schedule your posts to target the countries that make up
                            the bulk of your traffic. </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Geo Location.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Age Group
                        </h3>
                        <p class="pr-docs">Tailor your content and promotions by getting a break up of your audience by
                            their age group.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Age Group.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Device
                        </h3>
                        <p class="pr-docs">Find out if your YouTube audience is watching your videos on smartphones,
                            computers or TV.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Device.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">04</p>
                        <h3 class="pr-h3-title">
                            Organic vs. Paid
                        </h3>
                        <p class="pr-docs">View the split between organic and paid audiences on Facebook to measure the
                            efficacy of your promotional campaigns</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Organic vs Paid.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- Audience Profile section end  -->

        <!-- content strategy section -->
        <section id="content-strategy" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Tailor your content strategy</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Page fans online
                        </h3>
                        <p class="pr-docs">Maximize engagement and virality through a graph view of when your Facebook
                            audience tends to be online.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Page fans online.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Track sources
                        </h3>
                        <p class="pr-docs">Identify the sources driving traffic to your Facebook Pages and YouTube
                            channels to get better ROI on promotions.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Track sources.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Sharing behavior
                        </h3>
                        <p class="pr-docs">Get an insight into how your audience behaves after watching your YouTube
                            videos.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Sharing behavior.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- content strategy section end  -->

        <!-- market competitors section -->
        <section id="market-competitors" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Keep Tabs on the market & competitors</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Competitor performance
                        </h3>
                        <p class="pr-docs">Search for your competitors’ YouTube channels to view the key numbers associated with their videos.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Competitor performance.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Insight into trending videos
                        </h3>
                        <p class="pr-docs">Engage your audiences better by ideating around trends that are already
                            popular on YouTube.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Insight into trending videos.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Hashtag intelligence
                        </h3>
                        <p class="pr-docs">Increase organic reach by accessing the hashtags used by top-performing
                            channels in your category.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Hashtag intelligence.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- market competitors section end  -->

        <!-- reports section -->
        <section id="reports" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Deliver Professional Reports</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Export easily
                        </h3>
                        <p class="pr-docs">Getting access to presentation-ready reports is as easy as hitting ‘Export.’
                        </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Export easily.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Select date range
                        </h3>
                        <p class="pr-docs">Present the most relevant information by segmenting insights by date range.
                        </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-media-analytics/Select date range.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- reports section end  -->

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
        AOS.init();
    </script>
</body>

</html>
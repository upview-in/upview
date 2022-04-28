<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="{{ asset('main/images/favicon.ico') }}">
    <title>Upview</title>


    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('main/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/nouislider/nouislider.pips.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/mibooz-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('main/vendors/tiny-slider/tiny-slider.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/the-sayinistic-font/stylesheet.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/bxslider/jquery.bxslider.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/vendors/jquery-ui/jquery-ui.css') }}" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('main/css/mibooz.css') }}" />
    <link rel="stylesheet" href="{{ asset('main/css/mibooz-responsive.css') }}" />
</head>

<body>
    <div class="preloader">
        <img class="preloader__image" width="60" src="{{ asset('main/images/loader.png') }}" alt="" />
    </div>
    <!-- /.preloader -->
    <div class="page-wrapper">
        <header class="main-header main-header-two clearfix innerpgae">
            <nav class="main-menu main-menu-two clearfix">
                <div class="main-menu-wrapper">
                    <div class="main-menu-wrapper__logo">
                        <a href="{{ route('main.index') }}"><img src="{{ asset('main/images/resources/logo-2.png') }}" alt=""></a>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="index2.html#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li>
                                <a href="{{ route('main.index') }}">Home</a>

                            </li>
                            <li>
                                <a href="{{ route('main.about') }}">About Us</a>

                            </li>
                            <li class="dropdown current">
                                <a href="{{ route('main.features') }}">Features</a>

                            </li>
                            <li class="dropdown">
                                <a href="{{ route('main.pricing') }}">Pricing</a>

                            </li>

                            <li><a href="{{ route('main.contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__call">
                            <a href="https://{{ config('app.domains.app') }}/register" class="thm-btn welcome-two__btn">Free Demo</a>
                        </div>

                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu-two main-menu">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Page Header Start-->
        <section class="page-header">
            <div class="page-header-bg" style="background-image: url('{{ asset('main/images/backgrounds/page-header-bg.jpg') }} ')">
            </div>
            <div class="container">
                <div class="page-header__inner">

                    <h2>Features</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Services Three Start-->
        <section class="services-three">
            <div class="services-three-shape" style="background-image: url('{{ asset('main/images/shapes/services-three-shape.png') }} ')"></div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">check our Features</span>
                    <h2 class="section-title__title">what we’re offering</h2>
                </div>





                <div class="every-stage__tab-box tabs-box">
                    <ul class="tab-buttons clearfix list-unstyled">
                        <li data-tab="#mission" class="tab-btn active-btn"><span>Social Media Analytics</span></li>
                        <li data-tab="#vision" class="tab-btn"><span>Social Listening</span></li>

                    </ul>
                    <div class="tabs-content">
                        <!--tab-->
                        <div class="tab active-tab" id="mission">
                            <div class="tabs-content__inner">


                                <div class="services-three__top">
                                    <div class="row">
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Youtube & Facebook Analysis</a></h3>
                                                <p class="services-three__text">Analyze and check what is working for you and what is not working. </p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>


                                                <h3 class="services-three__title"><a href="javascript:void();">Audience Insights</a></h3>
                                                <p class="services-three__text"> With Upview, get the most relevant and non-manipulated data regarding your audience. This insight can easily help you tweak your content for your audience.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>


                                                <h3 class="services-three__title"><a href="javascript:void();">Competitor Analysis</a></h3>
                                                <p class="services-three__text">Monitor and analyze what your competitors are doing to determine how to keep ahead of them.</p>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Publish,Schedule, Draft and Queue Posts</a></h3>
                                                <p class="services-three__text">With Upview, you can not only easily publish & Schedule your posts but can keep your posts as Drafts or in Queue in case you want to get back to it and make some changes.</p>

                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Scheduling for optimal send time</a></h3>
                                                <p class="services-three__text">Upview provides you with the best time frames for you to publish your posts so that you can get the most amount of reach on your posts.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>


                                                <h3 class="services-three__title"><a href="javascript:void();">Paid social reporting for Facebook, Instagram, Twitter and LinkedIn</a></h3>
                                                <p class="services-three__text">Get, analyze and evaluate the best strategy on your paid social media posts. Strategize and earn the most with the help of Paid Social Reports.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Reporting</a></h3>
                                                <p class="services-three__text">In a few steps, access the complete account report to analyze and strategize the perfect plan for the next month. Strategizing is this easy with Upview!</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Group, Profile and post-level reporting</a></h3>
                                                <p class="services-three__text">Not only can you review your profile report but you can also get a group & a post level report. Easily access each post report and strategize the next plan!</p>

                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <!--tab-->
                        <div class="tab" id="vision">
                            <div class="tabs-content__inner">

                                <div class="services-three__top">
                                    <div class="row">

                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>



                                                <h3 class="services-three__title"><a href="javascript:void();">Audience Insights</a></h3>
                                                <p class="services-three__text"> With Upview, get the most relevant and non-manipulated data regarding your audience. This insight can easily help you tweak your content for your audience.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Content Strategy</a></h3>
                                                <p class="services-three__text">Prepare the best content for your social media posting and increase the reach of your profiles with the help of Upview. Strategizing your content as per your audience has never been this easy!</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">

                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>
                                                <h3 class="services-three__title"><a href="javascript:void();">Find Influencers</a></h3>
                                                <p class="services-three__text">With Upview, easily find the top influencers across the different social media platforms.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Influencer Evaluation</a></h3>
                                                <p class="services-three__text">Upview's thorough Influencer Evaluation is the greatest way to discover the ideal influencer to connect with for your product promotions or for finding the best influencer to collaborate with!</p>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Influencer Listening</a></h3>
                                                <p class="services-three__text">Check which markets the influencer is influencing the most!</p>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Competitor Analysis</a></h3>
                                                <p class="services-three__text">Monitor and analyze what your competitors are doing to determine how to keep ahead of them.</p>

                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">

                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>
                                                <h3 class="services-three__title"><a href="javascript:void();">Sentiment & Audience Interaction Analysis</a></h3>
                                                <p class="services-three__text">With Upview’s detailed analysis, find out what your audience is appreciating and feeling. Increase your reach many folds by understanding, improving and tweaking your content accordingly.</p>

                                            </div>
                                        </div>


                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">

                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>
                                                <h3 class="services-three__title"><a href="javascript:void();">Reporting</a></h3>
                                                <p class="services-three__text">In a few steps, access the complete account report to analyze and strategize the perfect plan for the next month. Strategizing is this easy with Upview!</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Follower Quality Analysis</a></h3>
                                                <p class="services-three__text">With an increase in the number of fake accounts, bots, likes & comments, protect yourself with Upview’s thorough Follower Quality Analysis.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Keyword and location monitoring</a></h3>
                                                <p class="services-three__text">Keywords & Location are two important pillars of social media marketing and with Upview, you get the most authenticate Keyword & Location Marketing.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Trend analysis for twitter keywords and hashtags</a></h3>
                                                <p class="services-three__text">While Trend Analysis is available for all platforms in our tool but since Twitter is built around these algorithms, we have a dedicated module for Twitter Trends, Keywords, and Hashtags.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Paid social reporting for Facebook, Instagram, Twitter and LinkedIn</a></h3>
                                                <p class="services-three__text">Get, analyze and evaluate the best strategy on your paid social media posts. Strategize and earn the most with the help of Paid Social Reports.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Help Desk CRM and Social Commerce Integration</a></h3>
                                                <p class="services-three__text">Our help-desk CRM will help you through any problems you might be facing, while you can obviously reach us anytime through any of our social media channels.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Brand Reporting</a></h3>
                                                <p class="services-three__text">Create in-depth brand reports in a few clicks for your clients. And the best of it all? Brand Reporting can be completely white-labelled.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Hashtag Reporting</a></h3>
                                                <p class="services-three__text">Track and find the best Hashtags to boost your reach with Upview's most accurate features.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Influencers Tracking and Analytics</a></h3>
                                                <p class="services-three__text">With Upview’s Influencer Tracking & Analytics module, easily track what the top Influencers are promoting and the impact their social media posts created in the market.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Brand Monitoring</a></h3>
                                                <p class="services-three__text">Easily manage and monitor the social media accounts of your clients with in-depth analytics and reports you get on Upview.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Content Analysis</a></h3>
                                                <p class="services-three__text">With so many social media platforms out there in the market, we need specially curated content for each of them. With Upview get the best content analysis in just a few clicks!</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Campaign Strategy</a></h3>
                                                <p class="services-three__text">Equipped with the in-depth reports and analysis from Upview, it becomes easier for you to think and strategize the right path for your or your client’s brand.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Competitor Intelligence</a></h3>
                                                <p class="services-three__text">Get the most real and accurate data analysis with Upview's qualitative Market Intelligence and arm yourself to effortlessly surpass the competition!</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Content Marketing</a></h3>
                                                <p class="services-three__text">Create the best content such as videos, posts, or blogs as per their intended target audience and boost your profile/brand.</p>

                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                                            <!--Services Three Single-->
                                            <div class="services-three__single">
                                                <div class="services-three_icon">
                                                    <span class="fa fa-clipboard-list"></span>

                                                </div>

                                                <h3 class="services-three__title"><a href="javascript:void();">Trend analysis</a></h3>
                                                <p class="services-three__text">Get an in-depth analysis of all the ongoing trends across all the platforms. With Upview’s factual analysis, find the best trends to boost your reach.</p>

                                            </div>
                                        </div>


                                    </div>
                                </div>


                            </div>
                        </div>
                        <!--tab-->

                    </div>
                </div>
            </div>
        </section>
        <!--Services Three End-->





        <!--Site Footer Start-->
        <footer class="site-footer">

            <div class="site-footer__middle">
                <div class="container">
                    <div class="site-footer__middle-inner">
                        <div class="row">
                            <div class="col-xl-3 col-lg-3 wow fadeInUp" data-wow-delay="100ms">
                                <div class="footer-widget__column footer-widget__contact">
                                    <h3 class="footer-widget__title">Contact</h3>
                                    <p class="footer-widget__contact-text">Mumbai</p>
                                    <h4 class="footer-widget__contact-email-phone">
                                        <a href="mailto:info@upview.in" class="footer-widget__contact-email">info@upview.in</a>
                                        <a href="tel:+91 9324633735" class="footer-widget__contact-phone">+91 9324633735</a>
                                    </h4>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 wow fadeInUp" data-wow-delay="200ms">
                                <div class="footer-widget__column footer-widget__links clearfix">
                                    <h3 class="footer-widget__title">Features</h3>
                                    <ul class="footer-widget__links-list list-unstyled clearfix">
                                        <li><a href="javascript:void();">Audience Insights</a></li>
                                        <li><a href="javascript:void();">Publish,Schedule, Draft and Queue Posts</a></li>
                                        <li><a href="javascript:void();">Scheduling for optimal send time</a></li>
                                        <li><a href="javascript:void();">Paid social reporting for Facebook, Instagram, Twitter and LinkedIn</a></li>
                                        <li><a href="javascript:void();">Reporting</a></li>
                                        <li><a href="javascript:void();">Group, Profile and post-level reporting</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled">
                                        <li><a href="javascript:void();">Youtube & Facebook Analysis</a></li>
                                        <li><a href="javascript:void();">Competitor Intelligence</a></li>
                                        <li><a href="javascript:void();">Content Strategy</a></li>
                                        <li><a href="javascript:void();">Find Influencers</a></li>
                                        <li><a href="javascript:void();">Influencer Evaluation</a></li>
                                        <li><a href="javascript:void();">Influencer Listening</a></li>
                                        <li><a href="javascript:void();">Sentiment & Audience Interaction Analysis</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled">
                                        <li><a href="javascript:void();">Follower Quality Analysis</a></li>
                                        <li><a href="javascript:void();">Keyword and location monitoring</a></li>
                                        <li><a href="javascript:void();">Trend analysis for twitter keywords and hashtags</a></li>
                                        <li><a href="javascript:void();">Help Desk CRM and Social Commerce Integration</a></li>
                                        <li><a href="javascript:void();">Brand Reporting</a></li>
                                        <li><a href="javascript:void();">Hashtag Reporting</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled clearfix">
                                        <li><a href="javascript:void();">Influencers Tracking and Analytics</a></li>
                                        <li><a href="javascript:void();">Brand Monitoring</a></li>
                                        <li><a href="javascript:void();">Content Analysis</a></li>
                                        <li><a href="javascript:void();">Campaign Strategy</a></li>
                                        <li><a href="javascript:void();">Competitor Analysis</a></li>
                                        <li><a href="javascript:void();">Content Marketing</a></li>
                                        <li><a href="javascript:void();">Trend analysis</a></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="site-footer__top">

                <div class="container">
                    <div class="site-footer__top-inner">
                        <div class="site-footer__top-left">
                            <h3 class="site-footer__top-left-title">Your Perfect Business Partner Solution</h3>
                            <a href="tel:+91 9324633735" class="site-footer__top-left-phone">+91 9324633735</a>
                        </div>
                        <div class="site-footer__top-right">
                            <div class="site-footer__top-right-social">
                                <a href="javascript:void();"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/upviewIndia/" target="_blank"><i class="fab fa-facebook"></i></a>

                                <a href="https://www.instagram.com/upviewindia/" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="site-footer__bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-10">
                            <div class="site-footer__bottom-inner">
                                <p class="site-footer__bottom-text">© Copyrights, <span class="dynamic-year"></span> <a href="javascript:void();">Upview.</a> All Rights Reserved.
                                </p>
                            </div>
                        </div>
                        <div class="col-xl-2 text-end">
                            <div class="site-footer__bottom-inner">
                                <p class="site-footer__bottom-text"><a href="{{ route('main.privacy-policy') }}">Privacy Policy</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!--Site Footer End-->


    </div><!-- /.page-wrapper -->


    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <!-- /.mobile-nav__overlay -->
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="{{ asset('main/images/resources/logo-2.png') }}" width="155" alt="" /></a>
            </div>
            <!-- /.logo-box -->
            <div class="mobile-nav__container"></div>
            <!-- /.mobile-nav__container -->

            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fa fa-envelope"></i>
                    <a href="mailto:info@upview.in">info@upview.in</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+91 9324633735">+91 9324633735</a>
                </li>
            </ul><!-- /.mobile-nav__contact -->
            <div class="mobile-nav__top">
                <div class="mobile-nav__social">
                    <a href="index2.html#" class="fab fa-twitter"></a>
                    <a href="index2.html#" class="fab fa-facebook-square"></a>
                    <a href="index2.html#" class="fab fa-pinterest-p"></a>
                    <a href="index2.html#" class="fab fa-instagram"></a>
                </div><!-- /.mobile-nav__social -->
            </div><!-- /.mobile-nav__top -->



        </div>
        <!-- /.mobile-nav__content -->
    </div>
    <!-- /.mobile-nav__wrapper -->

    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <!-- /.search-popup__overlay -->
        <div class="search-popup__content">
            <form action="#">
                <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
                <input type="text" id="search" placeholder="Search Here..." />
                <button type="submit" aria-label="search submit" class="thm-btn">
                    <i class="icon-magnifying-glass"></i>
                </button>
            </form>
        </div>
        <!-- /.search-popup__content -->
    </div>
    <!-- /.search-popup -->

    <a href="services.html#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


    <script src="{{ asset('main/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('main/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jarallax/jarallax.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('main/vendors/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('main/vendors/odometer/odometer.min.js') }}"></script>
    <script src="{{ asset('main/vendors/swiper/swiper.min.js') }}"></script>
    <script src="{{ asset('main/vendors/tiny-slider/tiny-slider.min.js') }}"></script>
    <script src="{{ asset('main/vendors/wnumb/wNumb.min.js') }}"></script>
    <script src="{{ asset('main/vendors/wow/wow.js') }}"></script>
    <script src="{{ asset('main/vendors/isotope/isotope.js') }}"></script>
    <script src="{{ asset('main/vendors/countdown/countdown.min.js') }}"></script>
    <script src="{{ asset('main/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('main/vendors/bxslider/jquery.bxslider.min.js') }}"></script>
    <script src="{{ asset('main/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('main/vendors/jquery-ui/jquery-ui.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('main/js/mibooz.js') }}"></script>
</body>

</html>
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
                        <a href="index.html"><img src="{{ asset('main/images/resources/logo-2.png') }}" alt=""></a>
                    </div>
                    <div class="main-menu-wrapper__main-menu">
                        <a href="index.html#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li>
                                <a href="index.html">Home</a>
                            </li>
                            <li>
                                <a href="about.html">About Us</a>
                            </li>
                            <li>
                                <a href="features.html">Features</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing</a>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__call">
                            <a href="javascript:void();" class="thm-btn welcome-two__btn">Free Demo</a>
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
            <div class="page-header-bg" style="background-image: url('{{ asset('main/images/backgrounds/page-header-bg.jpg') }} ') ">
            </div>
            <div class="container">
                <div class="page-header__inner">
                    <h2>Blog Details</h2>
                </div>
            </div>
        </section>
        <!--Page Header End-->

        <!--Blog Details Start-->
        <section class="blog-details">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-7">
                        <div class="blog-details__left">
                            <div class="blog-details__img">
                                <img src="{{ asset('main/images/blog/blog-details-img-1.jpg') }}" alt="">
                                <div class="blog-details__date-box">
                                    <p>26 aug</p>
                                </div>
                            </div>
                            <div class="blog-details__content">
                                <ul class="list-unstyled blog-details__meta">
                                    <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="blog-details__title">How much does a website cost to build</h3>
                                <p class="blog-details__text-1">Lorem ipsum dolor sit amet, cibo mundi ea duo, vim exerci phaedrum. There are many variations of passages of Lorem Ipsum available, but the majority have alteration in some injected or words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrang hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable.</p>
                                <p class="blog-details__text-2">Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type simen book. It has survived not only five centuries, but also the leap into electronic typesetting.</p>
                                <p class="blog-details__text-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry. orem Ipsum has been the industry's standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into unchanged.</p>
                            </div>
                            <div class="blog-details__bottom">
                                <div class="blog-details__social-list">
                                    <a href="blog-details.html#"><i class="fab fa-twitter"></i></a>
                                    <a href="blog-details.html#"><i class="fab fa-facebook"></i></a>
                                    <a href="blog-details.html#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-5">
                        <div class="sidebar">
                            <div class="sidebar__single sidebar__post">
                                <h3 class="sidebar__title">Latest Posts</h3>
                                <ul class="sidebar__post-list list-unstyled">
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('main/images/blog/lp-1-1.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="blog-details.html#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                                <a href="blog-details.html">experiences that connect us</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('main/images/blog/lp-1-2.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="blog-details.html#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                                <a href="blog-details.html">business advices for growth</a>
                                            </h3>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="sidebar__post-image">
                                            <img src="{{ asset('main/images/blog/lp-1-3.jpg') }}" alt="">
                                        </div>
                                        <div class="sidebar__post-content">
                                            <h3>
                                                <a href="blog-details.html#" class="sidebar__post-content-meta"><i class="far fa-comments"></i>2 Comments</a>
                                                <a href="blog-details.html">understanding of our customer</a>
                                            </h3>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Details End-->

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
                                        <li><a href="javascript:void(0);">Audience Insights</a></li>
                                        <li><a href="javascript:void(0);">Publish,Schedule, Draft and Queue Posts</a></li>
                                        <li><a href="javascript:void(0);">Scheduling for optimal send time</a></li>
                                        <li><a href="javascript:void(0);">Paid social reporting for Facebook, Instagram, Twitter and LinkedIn</a></li>
                                        <li><a href="javascript:void(0);">Reporting</a></li>
                                        <li><a href="javascript:void(0);">Group, Profile and post-level reporting</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled">
                                        <li><a href="javascript:void(0);">Youtube & Facebook Analysis</a></li>
                                        <li><a href="javascript:void(0);">Competitor Intelligence</a></li>
                                        <li><a href="javascript:void(0);">Content Strategy</a></li>
                                        <li><a href="javascript:void(0);">Find Influencers</a></li>
                                        <li><a href="javascript:void(0);">Influencer Evaluation</a></li>
                                        <li><a href="javascript:void(0);">Influencer Listening</a></li>
                                        <li><a href="javascript:void(0);">Sentiment & Audience Interaction Analysis</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled">
                                        <li><a href="javascript:void(0);">Follower Quality Analysis</a></li>
                                        <li><a href="javascript:void(0);">Keyword and location monitoring</a></li>
                                        <li><a href="javascript:void(0);">Trend analysis for twitter keywords and hashtags</a></li>
                                        <li><a href="javascript:void(0);">Help Desk CRM and Social Commerce Integration</a></li>
                                        <li><a href="javascript:void(0);">Brand Reporting</a></li>
                                        <li><a href="javascript:void(0);">Hashtag Reporting</a></li>
                                    </ul>
                                    <ul class="footer-widget__links-list footer-widget__links-list-two list-unstyled clearfix">
                                        <li><a href="javascript:void(0);">Influencers Tracking and Analytics</a></li>
                                        <li><a href="javascript:void(0);">Brand Monitoring</a></li>
                                        <li><a href="javascript:void(0);">Content Analysis</a></li>
                                        <li><a href="javascript:void(0);">Campaign Strategy</a></li>
                                        <li><a href="javascript:void(0);">Competitor Analysis</a></li>
                                        <li><a href="javascript:void(0);">Content Marketing</a></li>
                                        <li><a href="javascript:void(0);">Trend analysis</a></li>
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

    <a href="blog-details.html#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


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
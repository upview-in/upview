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
    <link rel="stylesheet" href="{{ asset('main/vendors/the-sayinistic-fontstylesheet.css') }}" />
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
    <div class=" preloader">
        <img class="preloader__image" width="60" alt="loader" src="{{ asset('main/images/loader.png') }}" />
    </div>
    <!-- /.preloader -->
    <div class=" page-wrapper">
        <header class="main-header main-header-two clearfix">
            <nav class="main-menu main-menu-two clearfix">
                <div class="main-menu-wrapper">
                    <div class="main-menu-wrapper__logo">
                        <a href="{{ route('main.index') }}"><img src="{{ asset('main/images/resources/logo-2.png') }}" alt=""></a>
                    </div>
                    <div class=" main-menu-wrapper__main-menu">
                        <a href="index2.html#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                        <ul class="main-menu__list">
                            <li class="current">
                                <a href="{{ route('main.index') }}">Home</a>
                            </li>
                            <li>
                                <a href="{{ route('main.about') }}">About Us</a>
                            </li>
                            <li>
                                <a href="{{ route('main.features') }}">Features</a>

                            </li>
                            <li>
                                <a href="{{ route('main.pricing') }}">Pricing</a>

                            </li>

                            <li><a href="{{ route('main.contact') }}">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="main-menu-wrapper__right">
                        <div class="main-menu-wrapper__call">
                            <a href="{{ route('login') }}" class="thm-btn welcome-two__btn">Login</a>
                        </div>
                        <div class="main-menu-wrapper__call">
                            <a href="{{ route('register') }}" class="thm-btn welcome-two__btn">Free Demo</a>
                        </div>

                    </div>
                </div>
            </nav>
        </header>

        <div class="stricky-header stricked-menu main-menu main-menu-two">
            <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
        </div><!-- /.stricky-header -->

        <!--Main Slider Start-->
        <section class="main-slider-two">
            <div class="main-slider-two__wrapper">
                <div class="image-layer" style="background-image: url(' {{ asset('main/images/backgrounds/main-slider-two-bg.png') }} ') "></div>
                <div class="main-slider-two-box-1"></div>
                <div class="main-slider-two-box-2"></div>
                <div class="main-slider-two-box-3"></div>
                <div class="main-slider-two-box-4"></div>
                <div class="main-slider-two-box-5"></div>
                <div class="main-slider-two-box-6"></div>
                <div class="main-slider-two-box-7"></div>
                <div class="main-slider-two-box-8"></div>
                <div class="main-slider-two-box-9"></div>
                <div class="main-slider-two-box-10"></div>
                <div class="main-slider__social">
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.facebook.com/upviewIndia/" target="_blank"><i class="fab fa-facebook"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-youtube"></i></a>
                    <a href="#" target="_blank"><i class="fab fa-linkedin"></i></a>
                    <a href="https://www.instagram.com/upviewindia/" target="_blank"><i class="fab fa-instagram"></i></a>
                </div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-7">
                            <div class="main-slider-two__content">
                                <h2 data-wow-duration="2000ms" class="wow fadeInUp">Social Listening: <br>
                                    POWERFUL & RELIABLE</h2>
                                <div class="main-slider-two__btn-video wow fadeInUp" data-wow-duration="2000ms">
                                    <div class="main-slider-two__btn">
                                        <a href="{{ route('main.features') }}" class="thm-btn">Know More</a>
                                    </div>

                                </div>
                                <div class="main-slider-two__img">
                                    <img src="{{ asset('main/images/img-3.png') }}" alt="" data-wow-duration=" 2000ms" class="wow fadeInRight" />

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Main Slider End-->

        <!--Feature One Start-->
        <section class="feature-one">
            <div class="feature-one__container">
                <ul class="list-unstyled feature-one__list clearfix">
                    <!--Feature One Single-->
                    <li class="feature-one__single wow fadeInUp" data-wow-delay="200ms">
                        <div class="feature-one__content">
                            <div class="feature-one__icon">
                                <span class="icon-checking"></span>
                            </div>
                            <h4 class="feature-one__title"><a href="javascript:void();">Social Listening</a></h4>
                            <p class="feature-one__text">Listen to what is happening on the web</p>
                        </div>
                    </li>
                    <!--Feature One Single-->
                    <li class="feature-one__single wow fadeInUp" data-wow-delay="400ms">
                        <div class="feature-one__content">
                            <div class="feature-one__icon">
                                <span class="icon-graphic-designer"></span>
                            </div>
                            <h4 class="feature-one__title"><a href="javascript:void();">Schedule your posts</a></h4>
                            <p class="feature-one__text">With Upview, schedule your posts hassle-free</p>
                        </div>
                    </li>
                    <!--Feature One Single-->
                    <li class="feature-one__single wow fadeInUp" data-wow-delay="600ms">
                        <div class="feature-one__content">
                            <div class="feature-one__icon">
                                <span class="icon-social-media"></span>
                            </div>
                            <h4 class="feature-one__title"><a href="javascript:void();">Hashtag Reporting</a></h4>
                            <p class="feature-one__text">Track not just the top trending hashtags but also the hashtags your audience is using!</p>
                        </div>
                    </li>
                    <!--Feature One Single-->
                    <li class="feature-one__single wow fadeInUp" data-wow-delay="800ms">
                        <div class="feature-one__content">
                            <div class="feature-one__icon">
                                <span class="icon-recommend"></span>
                            </div>
                            <h4 class="feature-one__title"><a href="javascript:void();">Brand Management</a></h4>
                            <p class="feature-one__text">With over 25 tools at your disposal, you can easily control your brand's social media reach.</p>
                        </div>
                    </li>
                </ul>
            </div>
        </section>
        <!--Feature One End-->

        <!--Welcome Two Start-->
        <section class="welcome-two">
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">welcome to Upview</span>
                    <h2 class="section-title__title">About Us</h2>
                </div>
                <div class="row">
                    <div class="col-xl-6">
                        <div class="welcome-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="welcome-two__img-box">
                                <div class="welcome-two__img">
                                    <img src="{{ asset('main/images/resources/home-about-us-1.jpg') }}" alt="">
                                </div>
                                <div class=" welcome-two__small-img">
                                    <img src="{{ asset('main/images/resources/home-about-us-2.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" col-xl-6">
                        <div class="welcome-two__right">
                            <div class="welcome-two__big-text">Upview</div>
                            <p class="welcome-two__right-text">Helping Create Powerful Brand Identities: We provide the most unique and all-in-one tool for all of your social media platform needs/demands.</p>
                            <ul class="welcome-two__points list-unstyled">
                                <li>

                                    <div class="icon">
                                        <span class="icon-tick"></span>
                                    </div>
                                    <div class="text">
                                        <h4>One-stop solution</h4>
                                        <p>When you have Upview, you don’t need anything else to manage and grow your social media presence.</p>
                                    </div>

                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-tick"></span>
                                    </div>
                                    <div class="text">
                                        <h4>Effortless to Use</h4>
                                        <p>Our app is one of the simplest on the market. Adding Profiles and analyzing them has never been easier!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-tick"></span>
                                    </div>
                                    <div class="text">
                                        <h4>Trend Analysis</h4>
                                        <p>Get the most detailed analysis of the ongoing trends across all the different platforms.</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-tick"></span>
                                    </div>
                                    <div class="text">
                                        <h4>Content Strategy</h4>
                                        <p>We not only assist you in assessing your content, but we also assist you in developing the ideal content plan for increasing your reach!</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <span class="icon-tick"></span>
                                    </div>
                                    <div class="text">
                                        <h4>Audience Insights</h4>
                                        <p>Get the most relevant and non-manipulated data regarding your audience.</p>
                                    </div>
                                </li>
                            </ul>
                            <a href="{{ route('main.features') }}" class="thm-btn welcome-two__btn">Discover More</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Welcome Two End-->



        <!--Services Two Start-->
        <section class="services-two">
            <div class="services-two-shape" style="background-image: url('{{ asset('main/images/shapes/services-two-shape.png') }}' )">
            </div>
            <div class="container-fluid">
                <div class="section-title text-center">

                    <h2 class="section-title__title">what we’re offering</h2>
                    <p class="">All in one solution to Social Media Management</p>

                </div>
                <ul class="list-unstyled clearfix services-two__list">
                    <!--Services Two Single-->
                    <li class="services-two__single wow fadeInUp" data-wow-delay="200ms">
                        <div class="class-icon">
                            <div class="services-two__icon">
                                <span class="icon-online-shopping"></span>
                            </div>
                            <h3 class="services-two__title"><a href="javascript:void();">Youtube & Facebook <br> Analysis</a>
                            </h3>
                            <p class="services-two__text">Analyze and check what is working for you and what is not working.</p>
                        </div>
                    </li>
                    <!--Services Two Single-->
                    <li class="services-two__single wow fadeInUp" data-wow-delay="400ms">
                        <div class="class-icon">
                            <div class="services-two__icon">
                                <span class="icon-growth"></span>
                            </div>
                            <h3 class="services-two__title"><a href="javascript:void();">Competitor <br> Analysis</a></h3>
                            <p class="services-two__text">Monitor and analyze what your competitors are doing to determine how to keep ahead of them.</p>
                        </div>
                    </li>
                    <!--Services Two Single-->
                    <li class="services-two__single wow fadeInUp" data-wow-delay="600ms">
                        <div class="class-icon">
                            <div class="services-two__icon">
                                <span class="icon-webpage"></span>
                            </div>
                            <h3 class="services-two__title"><a href="javascript:void();">Brand <br> Monitoring</a></h3>
                            <p class="services-two__text">Monitor how and what a brand is doing.</p>
                        </div>
                    </li>
                    <!--Services Two Single-->
                    <li class="services-two__single wow fadeInUp" data-wow-delay="800ms">
                        <div class="class-icon">
                            <div class="services-two__icon">
                                <span class="icon-front-end"></span>
                            </div>
                            <h3 class="services-two__title"><a href="javascript:void();">Influencer <br> Listening</a>
                            </h3>
                            <p class="services-two__text">Check which markets the influencer is influencing the most!</p>
                        </div>
                    </li>
                </ul>
                <div class="row">
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay="900ms">
                        <div class="services-two__btn-box">
                            <a href="{{ route('main.features') }}" class="services-two__btn">view all Features</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Services Two End-->



        <!--Project Two Start-->
        <section class="project-two">
            <div class="container">
                <div class="project-two__top">
                    <div class="row align-items-center">
                        <div class="col-xl-12">
                            <div class="project-two__left">
                                <div class="section-title text-center">
                                    <span class="section-title__tagline">recent projects</span>
                                    <h2 class="section-title__title">Case Studies</h2>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="project-two__work">
                <div class="project-two__work-inner">
                    <div class="row filter-layout masonary-layout">
                        <div class="col-xl-3 col-lg-6 col-md-6 filter-item bra photo web">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-2.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 filter-item bra web">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-3.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-6 col-lg-6 col-md-6 filter-item bra photo">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-1.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 filter-item bra photo app">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-6.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 filter-item bra app web">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-4.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-6 col-md-6 filter-item bra web">
                            <!--Portfolio One Single-->
                            <div class="project-one__single">
                                <div class="project-one__img">
                                    <img src="{{ asset('main/images/resources/project-two-img-5.jpg') }}" alt="">
                                    <div class="project-one__hover">
                                        <p class="project-one__tagline">Graphic</p>
                                        <h3 class="project-one__title"><a href="javascript:void();">Fimlor
                                                Experience</a></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <!--Project Two End-->



        <!--Testimonial Two Start-->
        <section class="testimonial-two">
            <div class="testimonial-two-shape wow slideInRight" data-wow-delay="100ms" data-wow-duration="2500ms"><img src="{{ asset('main/images/shapes/testimonial-two-shape.png') }}" alt=""></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="testimonial-two__left wow slideInLeft" data-wow-delay="100ms" data-wow-duration="2500ms">
                            <div class="testimonial-two__img">
                                <img src="{{ asset('main/images/testimonial/testimonial-two-img.png') }}" alt="">

                                <div class="testimonial-two__box-1"></div>
                                <div class="testimonial-two__box-2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="testimonial-two__right">
                            <div class="section-title text-left">
                                <span class="section-title__tagline">testimonials</span>
                                <h2 class="section-title__title">What they’re saying</h2>
                            </div>
                            <div class="testimonial-two__carousel owl-theme owl-carousel">
                                <!--Testimonial Two Single-->
                                <div class="testimonial-two__single">
                                    <p class="testimonial-two__text">I must have used more than 3 platforms but have never been more satisfied with the features of a platform than with Upview. A permanent user of Upview forever!</p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('main/images/testimonial/testimonial-one-img-2.jpg') }}" alt="">
                                        </div>
                                        <div class="testimonial-two__client-details">
                                            <h4 class="testimonial-two__client-name">Lorem Ipsum</h4>
                                            <p class="testimonial-two__client-title">Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Testimonial Two Single-->
                                <div class="testimonial-two__single">
                                    <p class="testimonial-two__text">One issue I was facing with other applications is that they are limited to just one or two platforms and I use several different applications to post on Youtube, Instagram, Facebook, LinkedIn & Twitter. Upview not only removed all these hassles but saved me lots of time as well.</p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('main/images/testimonial/testimonial-one-img-1.jpg') }}" alt="">
                                        </div>
                                        <div class="testimonial-two__client-details">
                                            <h4 class="testimonial-two__client-name">Lorem Ipsum</h4>
                                            <p class="testimonial-two__client-title">Customer</p>
                                        </div>
                                    </div>
                                </div>
                                <!--Testimonial Two Single-->
                                <div class="testimonial-two__single">
                                    <p class="testimonial-two__text">Upview has been a saviour, I was struggling in keeping up with the posting but now I can easily schedule it all together and not have to worry about anything. And to add to it, I can assess what was working for me and what was not.</p>
                                    <div class="testimonial-two__client-info">
                                        <div class="testimonial-two__client-img">
                                            <img src="{{ asset('main/images/testimonial/testimonial-one-img-3.jpg') }}" alt="">
                                        </div>
                                        <div class="testimonial-two__client-details">
                                            <h4 class="testimonial-two__client-name">Lorem Ipsum</h4>
                                            <p class="testimonial-two__client-title">Customer</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Testimonial Two End-->



        <!--Brand Two Start-->
        <section class="brand-one">
            <div class="container">
                <div class="thm-swiper__slider swiper-container" data-swiper-options='{"spaceBetween": 100, "slidesPerView": 5, "autoplay": { "delay": 5000 }, "breakpoints": {
                    "0": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "375": {
                        "spaceBetween": 30,
                        "slidesPerView": 2
                    },
                    "575": {
                        "spaceBetween": 30,
                        "slidesPerView": 3
                    },
                    "767": {
                        "spaceBetween": 50,
                        "slidesPerView": 4
                    },
                    "991": {
                        "spaceBetween": 50,
                        "slidesPerView": 5
                    },
                    "1199": {
                        "spaceBetween": 100,
                        "slidesPerView": 5
                    }
                }}'>
                    <div class=" swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-2.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-3.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-4.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-5.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-1.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-2.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-3.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-4.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                        <div class="swiper-slide">
                            <img src="{{ asset('main/images/brand/brand-1-5.png') }}" alt="">
                        </div><!-- /.swiper-slide -->
                    </div>
                </div>
            </div>
        </section>
        <!--Brand Two End-->

        <!--Blog Two Start-->
        <section class="blog-two">
            <div class="blog-two-shape" style="background-image: url('{{ asset('main/images/shapes/blog-two-shape.png') }}')"></div>
            <div class="container">
                <div class="section-title text-center">
                    <span class="section-title__tagline">directly from the blog</span>
                    <h2 class="section-title__title">What’s happening?</h2>
                </div>
                <div class="row">
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="200ms">
                        <!--Blog One Single-->
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ asset('main/images/blog/blog-one-img-1.jpg') }}" alt="">
                                <a href="blog-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                                <div class="blog-one__date">
                                    <p>26 aug</p>
                                </div>
                            </div>
                            <div class="blog-content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title">
                                    <a href="blog-details.html">How much does a website cost to build</a>
                                </h3>
                                <div class="blog-one__read-btn">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="400ms">
                        <!--Blog One Single-->
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ asset('main/images/blog/blog-one-img-2.jpg') }}" alt="">
                                <a href="blog-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                                <div class="blog-one__date">
                                    <p>26 aug</p>
                                </div>
                            </div>
                            <div class="blog-content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title">
                                    <a href="blog-details.html">task researched data enterprise process</a>
                                </h3>
                                <div class="blog-one__read-btn">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 wow fadeInUp" data-wow-delay="600ms">
                        <!--Blog One Single-->
                        <div class="blog-one__single">
                            <div class="blog-one__img">
                                <img src="{{ asset('main/images/blog/blog-one-img-3.jpg') }}" alt="">
                                <a href="blog-details.html">
                                    <span class="blog-one__plus"></span>
                                </a>
                                <div class="blog-one__date">
                                    <p>26 aug</p>
                                </div>
                            </div>
                            <div class="blog-content">
                                <ul class="list-unstyled blog-one__meta">
                                    <li><a href="blog-details.html"><i class="far fa-user-circle"></i> By admin</a></li>
                                    <li><span>/</span></li>
                                    <li><a href="blog-details.html"><i class="far fa-comments"></i> 2 Comments</a>
                                    </li>
                                </ul>
                                <h3 class="blog-one__title">
                                    <a href="blog-details.html">Uniquely enable accurate supply chains</a>
                                </h3>
                                <div class="blog-one__read-btn">
                                    <a href="blog-details.html">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Blog Two End-->

        <!--CTA One Start-->
        <section class="cta-one">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="cta-one__inner wow fadeInUp" data-wow-delay="300ms">
                            <div class="cta-one__box-1"></div>
                            <div class="cta-one__box-2"></div>
                            <div class="cta-one__left">
                                <div class="cta-one__icon">
                                    <span class="icon-consulting"></span>
                                </div>
                                <div class="cta-one__title-box">
                                    <h2 class="cta-one__title">we’re delivering the best <br> customer experience</h2>
                                </div>
                            </div>
                            <div class="cta-one__right">
                                <a href="contact.html" class="thm-btn cta-one__btn">let’s get started</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--CTA One End-->

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

    <a href="index2.html#" data-target="html" class="scroll-to-target scroll-to-top"><i class="fa fa-angle-up"></i></a>


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
    <script src="{{ asset('main/vendors/jquery-tilt/tilt.jquery.min.js') }}"></script>
    <!-- template js -->
    <script src="{{ asset('main/js/mibooz.js') }}"></script>
</body>

</html>
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
    <!-- Custom Placeholder CSS -->
    <link rel="stylesheet" href="{{ asset('main/assets/customstyle.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css" integrity="sha512-1cK78a1o+ht2JcaW6g8OXYwqpev9+6GqOkz9xmBN9iUUhIndKtxwILGWYOSibOKjLsEdjyjZvYDq/cZwNeak0w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js" integrity="sha512-A7AYk1fGKX6S2SsHywmPkrnzTZHrgiVT7GcQkLGDe2ev0aWb8zejytzS8wjo7PGEXKqJOrjQ4oORtnimIRZBtw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            <div class="breadcrumb-area-bg" style="background-image: url( {{ asset('main/assets/images/breadcrumb/Social_Media_Listening.png') }} );"></div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content paroller text-center">
                            <div class="title">
                                <h2 style="font-size: 50px;">Social Listening</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->

        <!-- Intuitive setup section -->
        <section id="Intuitive-setup" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Intuitive Setup</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Set up alerts
                        </h3>
                        <p class="pr-docs">Create alerts by adding (or excluding) keywords for your brands and product
                            categories. You can also use Boolean rules to create alerts.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Set up alerts.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Focus on key locations
                        </h3>
                        <p class="pr-docs">You can fine-tune your social listening further by specifying the countries you wish to track.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Focus on key locations.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Specify sources
                        </h3>
                        <p class="pr-docs">Don’t miss out on any conversation. Choose from sources like Twitter, Facebook, Instagram, YouTube, Vimeo, Reddit, News/Blogs, and webpages.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Specify sources.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">04</p>
                        <h3 class="pr-h3-title">
                            Specify date range
                        </h3>
                        <p class="pr-docs">You can filter results by date range – tracking the performance of your promotional campaigns or measuring the impact of content that has gone viral.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Specify date range.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- Intuitive setup section end  -->

        <!-- track competitors section -->
        <section id="track-competitors" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Track Competitors</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Competitor alert
                        </h3>
                        <p class="pr-docs"> Set up alerts for key competitor brands to build an understanding of their
                            reach and influence.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Competitor alert.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Sentiment comparison
                        </h3>
                        <p class="pr-docs">Compare how your customers feel about your brand in comparison to competitor
                            brands. </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Sentiment comparison.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Topic cloud intersection
                        </h3>
                        <p class="pr-docs">Identify the topics where you and your competitors are mentioned in the same
                            context to adjust your communication.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Topic cloud intersection.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- track competitors section end  -->

        <!-- get the context section -->
        <section id="get-the-context" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Get the context</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Topic clouds
                        </h3>
                        <p class="pr-docs">Get an easy-to-digest overview of the topics where you are being mentioned by
                            people online.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Topic clouds.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Real-time updates
                        </h3>
                        <p class="pr-docs">Strategize and respond swiftly by getting real-time updates when people discuss your brand.
                        </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Real-time updates.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">03</p>
                        <h3 class="pr-h3-title">
                            Measure reach
                        </h3>
                        <p class="pr-docs">Get a sense of the number of people talking about you and the number of mentions your brand is getting.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Measure reach.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">04</p>
                        <h3 class="pr-h3-title">
                            Demographic breakdown
                        </h3>
                        <p class="pr-docs">Dive deeper by segmenting the audience by age and gender.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Demographic breakdown.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- get the context section end  -->

        <!-- sentiment analysis section -->
        <section id="sentiment-analysis" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Sentiment Analysis</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Positive or Negative
                        </h3>
                        <p class="pr-docs">Our intelligent algorithms scan and interpret updates to classify sentiments
                            into two easy-to-understand categories. </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Positive or Negative.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            View content updates
                        </h3>
                        <p class="pr-docs">Optimize your content strategy by viewing the tweets, photos, videos, and
                            articles driving positive or negative sentiments.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/View content updates.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- sentiment analysis section end  -->

        <!-- evaluate influencer section -->
        <section id="evaluate-influencers" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Evaluate Influencers</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Key drivers
                        </h3>
                        <p class="pr-docs">Identify the influencers or company handles whose updates have an outsized
                            impact on positive or negative sentiments. This helps in areas like promotion strategy or
                            crisis communication</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Key drivers.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Filter by source
                        </h3>
                        <p class="pr-docs">View the platforms where your brand is being discussed the most. You can even
                            filter findings by source.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Filter by source.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- evaluate influencer section end  -->

        <!-- generate reports section -->
        <section id="generate-reports" class="pr-section">
            <div class="inner-content paroller text-center">
                <div class="title">
                    <h2 style="font-size: 50px;">Generate reports</h2>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">01</p>
                        <h3 class="pr-h3-title">
                            Easy report generation
                        </h3>
                        <p class="pr-docs">Generate visual, presentation-ready reports with just a few clicks. </p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Easy report generation.png') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="pr-row">
                <div class="pr-col">
                    <div class="pr-nifo" data-aos="fade-right" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <p class="pr-nob">02</p>
                        <h3 class="pr-h3-title">
                            Widget-based layout
                        </h3>
                        <p class="pr-docs">Tailor your reports by dragging and dropping data points that show the most relevant information.</p>
                    </div>
                </div>
                <div class="pr-col">
                    <div class="pr-img" data-aos="fade-left" ata-aos-offset="150" data-aos-easing="ease-in-sine">
                        <img src="{{ asset('main/assets/images/social-listening/Widget-based layout.png') }}" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- generate reports section end  -->


        <!--Start footer area -->
        <footer class="footer-area style2 mt-5">
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
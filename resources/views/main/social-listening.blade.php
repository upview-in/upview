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
<<<<<<< HEAD
=======
                                            <li><a href="{{ route('login') }}">Login</a></li>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                        </ul>
                                    </div>
                                </nav>
                                <!-- Main Menu End-->
                            </div>

                        </div>

                        <div class="header-three_right">
                            <div class="btns-box">
<<<<<<< HEAD
                                <a class="btn-one" href="{{ route('login') }}">
                                    <span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
=======
                                <a class="btn-one" href="{{ route('register') }}">
                                    <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
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
                            <a href="{{ route('main.index') }}" class="img-responsive"><img
                                    src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt=""
                                    title=""></a>
                        </div>
                        <!--Right Col-->
                        <div class="right-col float-right">
                            <!-- Main Menu -->
                            <nav class="main-menu clearfix">
                                <!--Keep This Empty / Menu will come through Javascript-->
                            </nav>
<<<<<<< HEAD
                            <a class="btn-one ml-4 m-4" href="{{ route('login') }}">
                                <span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
=======
                            <a class="btn-one ml-4 m-4" href="{{ route('register') }}">
                                <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
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
                    <div class="nav-logo"><a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}"
                                width="150px" height="50px" alt="" title=""></a></div>
                    <div class="menu-outer">
                        <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
                    </div>
<<<<<<< HEAD
                    <a class="btn-one ml-4 m-4" href="{{ route('login') }}">
                        <span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
=======
                    <a class="btn-one ml-4 m-4" href="{{ route('register') }}">
                        <span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                    </a>
                    <!--Social Links-->
                    <div class="social-links">
                        <ul class="clearfix">
<<<<<<< HEAD
                            <li><a href="#"><span class="fab fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fab fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fab fa fa-pinterest-square"></span></a></li>
                            <li><a href="#"><span class="fab fa fa-google-plus-square"></span></a></li>
                            <li><a href="#"><span class="fab fa fa-youtube-square"></span></a></li>
=======
                            <li><a href="https://www.facebook.com/upviewIndia/"><span class="fab fa fa-facebook-square"></span></a></li>
                            <li><a href="https://twitter.com/UpviewIndia"><span class="fab fa fa-twitter-square"></span></a></li>
                            <li><a href="https://www.linkedin.com/showcase/upview-india"><span class="fab fa fa-linkedin-square"></span></a></li>
                            <li><a href="https://instagram.com/upviewindia"><span class="fab fa fa-instagram-square"></span></a></li>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                        </ul>
                    </div>
                </nav>
            </div>
            <!-- End Mobile Menu -->
        </header>

        <!--Start breadcrumb area-->
        <section class="breadcrumb-area breadcrumb-area-style2">
            <div class="breadcrumb-area-bg"
                style="background-image: url({{ asset('main/assets/images/breadcrumb/Social_Media_Listening.png') }} );">
            </div>
<<<<<<< HEAD
            <div class="breadcrumb-social-link">
                <ul class="clearfix">
                    <li class="wow slideInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                        <a href="#" style="color: white"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="700ms" data-wow-duration="2000ms">
                        <a href="#" style="color: white"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="900ms" data-wow-duration="1000ms">
                        <a href="#" style="color: white"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="1100ms" data-wow-duration="2100ms">
                        <a href="#" style="color: white"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>
=======
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content paroller text-center">
                            <div class="title">
                                <h2>Social<br />Listening</h2>
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
<<<<<<< HEAD
                                        Your customers are talking about you right now! Tune into their conversations
                                        with social listening
                                    </h3>
                                    <div class="mt-5">
                                        <p>
                                            Over 5.5mbillion active users share content everyday on social media.
                                            With so much content being shared, you need help to keep up with everything.
                                            You need Social Listening!<br /><br />
                                            You can now spot emerging trends faster then ever across social media. Get
                                            to know who is driving the most impactful conversations. Get a clear picture
                                            of how you stack up against your competition. You can count on Upview to
                                            reveal where other brands succeed.
=======
                                        Social is about engaging, it’s about conversation, it’s about listening.
                                    </h3>
                                    <div class="mt-5">
                                        <p>
                                        A brand is no longer what we tell the consumer it is. It is what consumers tell each other it is. At Upview, we help you to make sense of the millions of customer conversations happening in real time. It's as easy as searching for topics of interest in real-time from the 5.5 billion new posts added daily. You can save keywords to find meaningful trends and patterns you might miss with regular social monitoring. Filter your searches for specifics like demographics and locations. Whether you’re planning your next big launch or going through a crisis, Upview gives your decision makers the tools to make critical business decisions with the right insights.<br /><br />
                                        We help you to cut through the noise, uncover emerging trends, and spot important conversations that others miss.
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
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
                        <h3>Our Services</h3>
                    </div>
                    <h2>
                        Perfect Blend of Creativity & Technology<br />to Imprint your Presence Online
                    </h2>
                </div>
                <div class="row">
                    <!--Start Single Service Style3-->
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="single-service-style3 text-center">
                            <div class="icon">
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-1.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">Influencer Evaluation</a>
=======
                                    <a href="javascript:void();">Influencer Evaluation</a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Know the truth!
                                        Reach out to Right Influencers for your brand.

                                        Upview helps you find right Influencers to develop impactful relationships and
                                        start business collaborations.

                                        Get massive database of influencer profiles. Upview’s AI indexes & updates
                                        profiles in real-time. Beyond that, Upview also lets you use keywords to find
                                        influencers related to your niche & also gives you a full image of that person’s
                                        social media presence.
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
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-2.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">Competitor Analysis </a>
=======
                                    <a href="javascript:void();">Competitor Analysis </a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Are you tried of using all marketing tactics and still lack behind your
                                        competitors & madly trying to achieve the same success rate?

                                        Our Competitor analysis tools will help you track, analyze, and learn from your
                                        competitors' strategies, you can use that information to fire up your marketing
                                        campaigns.

                                        This tool gives you gives you an instant overview of any brand online. Brining
                                        extensive coverage of social networks, news sites, blogs, and forums.
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
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-3.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">Sentiment & Audience Interaction Analysis</a>
=======
                                    <a href="javascript:void();">Sentiment & Audience Interaction Analysis</a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Social media monitoring tool combined with advanced sentiment analysis working
                                        together to protect your brand, analyze your audience opinions, and connect you
                                        with potential customers.

                                        We Accurately calculate the sentiments of the topics in any conversation and
                                        helps you get extract sentiments across any conversations.Now you can Learn what your
                                        customers think about your products.
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
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-4.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">content strategy and audience</a>
=======
                                    <a href="javascript:void();">content strategy and audience</a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Upview helps you find & understand the audience that matters most to your brand
                                        & creates a customised portrait of your consumers entire world with unrivalled
                                        granularity.  This feature helps you engage with your target audience at the
                                        right time, on the right channels. Lets you Create an unbeatable brand
                                        strategies based on authentic consumer intelligence.
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
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-4.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">Hashtag Reporting</a>
=======
                                    <a href="javascript:void();">Hashtag Reporting</a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Our AI-Powered technology of Social Listening enables you to generate the most
                                        authentic and powerful Hashtag Analytics making it easier for you to accomplish
                                        a host of tasks through one tool. It also enables hashtag monitoring in the
                                        easiest way. Moreover it allows you to narrow your search on particular hashtags
                                        and keywords which are most relevant to your niche.
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
                                <img src="{{ asset('main/assets/images/icon/services/service-v2-4.png') }} " alt="" />
                            </div>
                            <div class="title">
                                <h3>
<<<<<<< HEAD
                                    <a href="services-details.html">Trend Analysis</a>
=======
                                    <a href="javascript:void();">Trend Analysis</a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
                                </h3>
                                <div class="inner-text">
                                    <p>
                                        Do you have sleepless nights worrying that you're missing a major trend? You can
                                        now literally be a trend setter by using our trend analysis tool. Trend analysis
                                        will help you understand future consumers, and the products they’ll want. You
                                        can now discover and analyze market trends in few clicks & turn them into
                                        actionable campaigns.
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
									<h2>Get in touch, or create an account.</h2>
								</div>
								<div class="button-box">
									<a class="btn-one" href="{{ route('main.contact') }}">
										<div class="border_line">
											<img src="{{ asset('main/assets/images/shape/button-border.png') }}" alt="" />
										</div>
										<div class="left_round"></div>
										<div class="right_round"></div>
										<span class="txt">Explore Now<i class="flaticon-plus-1 plusicon"></i></span>
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
<<<<<<< HEAD
										<a href="index.html">
=======
										<a href="{{ route('main.index') }}">
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
											<img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px"
												height="60px" alt="" /></a>
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
<<<<<<< HEAD
									<li><a href="blog.html">Blog</a></li>
									<li><a href="#">Members</a></li>
=======
									<li><a href="javascript:void();">Blog</a></li>
									<li><a href="javascript:void();">Members</a></li>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
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
											<img src="{{ asset('main/assets/images/footer/instagram-1.jpg') }}" alt="" />
											<div class="overlay">
												<div class="inner">
													<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<img src="{{ asset('main/assets/images/footer/instagram-2.jpg') }}" alt="" />
											<div class="overlay">
												<div class="inner">
<<<<<<< HEAD
													<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
=======
													<a href="#"><i class="fa fa-faceboom" aria-hidden="true"></i></a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<img src="{{ asset('main/assets/images/footer/instagram-3.jpg') }}" alt="" />
											<div class="overlay">
												<div class="inner">
<<<<<<< HEAD
													<a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
=======
													<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
												</div>
											</div>
										</div>
									</li>
								</ul>

								<div class="bottom-box">
									<ul>
<<<<<<< HEAD
										<li><a href="privacy-policy.html">Privacy</a></li>
=======
										<li><a href="{{ route('main.privacy-policy') }}">Privacy</a></li>
>>>>>>> 9c3a0a5ede4773de58842b4e9a732431c44d4ff3
										<li><a href="#">Terms & Conditions </a></li>
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
</body>

</html>
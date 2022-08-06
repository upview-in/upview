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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap"
        rel="stylesheet">

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

    <link rel="stylesheet" href="{{ asset('main/assets/css/bxslider.css') }}">

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
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favicon-32x32.png') }}" sizes="32x32">
    <link rel="icon" type="image/png" href="{{ asset('main/assets/images/favicon/favicon-16x16.png') }}" sizes="16x16">


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
                    <div class="nav-logo"><a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}"
                                width="150px" height="50px" alt="" title=""></a></div>
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
            <div class="breadcrumb-area-bg" style="background-image: url({{ asset('main/assets/images/breadcrumb/Privacy_Policy.png') }} );">
            </div>
            <div class="breadcrumb-social-link">
                <ul class="clearfix">
                    <li class="wow slideInUp" data-wow-delay="500ms" data-wow-duration="1000ms">
                        <a href="https://www.facebook.com/upviewIndia/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="700ms" data-wow-duration="2000ms">
                        <a href="https://twitter.com/upview_in" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="900ms" data-wow-duration="1000ms">
                        <a href="https://www.linkedin.com/showcase/upview-india" target="_blank"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    </li>
                    <li class="wow slideInUp" data-wow-delay="1100ms" data-wow-duration="2100ms">
                        <a href="https://instagram.com/upview.in" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                    </li>
                </ul>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="inner-content paroller text-center">
                            <div class="title">
                                <h2>Privacy Policy</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->


        <!--Start Privacy Policy Area-->
        <section class="portfolio-details-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="portfolio-details_content">

                            <div class="container">
                                <div class="row mb-n7">
                                    <div class="col-12 mb-7">
                                        <div class="service-details">
                                            <div class="service-details-list">
                                                <h1 class="title">Upview.in Mobile App Privacy Policy</h1>
                                                <h4>Last updated: July 11, 2022</h4>
                                                <p>
                                                    Renuka Gondalia built the Upview app as
                                                    a Free app. This SERVICE is provided by
                                                    Renuka Gondalia at no cost and is intended for use as
                                                    is. Upview's services are free to use upon registration according to the demo.
                                                    Afterwords, users are required to use our in app  subscriptions page to purchase
                                                    a valid plan to continue their services.
                                                  </p> <p>
                                                    This page is used to inform visitors regarding our
                                                    policies with the collection, use, and disclosure of Personal
                                                    Information if anyone decided to use our Service.
                                                  </p> <p>
                                                    If you choose to use our Service, then you agree to
                                                    the collection and use of information in relation to this
                                                    policy. The Personal Information that We collect is
                                                    used for providing and improving the Service. We will not use or share your information with
                                                    anyone except as described in this Privacy Policy.
                                                  </p> <p>
                                                    The terms used in this Privacy Policy have the same meanings
                                                    as in our Terms and Conditions, which are accessible at
                                                    Upview unless otherwise defined in this Privacy Policy.
                                                  </p> <p><h4 class="title">Information Collection and Use</h4></p> <p>
                                                    For a better experience, while using our Service, We
                                                    may require you to provide us with certain personally
                                                    identifiable information, including but not limited to For full platform policies Visit https://upview.in/privacy-policy. The information that
                                                    We request will be retained on your device and is not collected by me in any way.
                                                  </p> <div><p>
                                                      The app does use third-party services that may collect
                                                      information used to identify you.
                                                    </p> <p>
                                                      Link to the privacy policy of third-party service providers used
                                                      by the app
                                                    </p> <ul><!----><!----><li><a href="https://firebase.google.com/policies/analytics" target="_blank" rel="noopener noreferrer">Google Analytics for Firebase</a></li><li><a href="https://firebase.google.com/support/privacy/" target="_blank" rel="noopener noreferrer">Firebase Crashlytics</a></li><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><li><a href="https://onesignal.com/privacy_policy" target="_blank" rel="noopener noreferrer">One Signal</a></li><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----><!----></ul></div> <p><h4 class="title">Log Data</h4></p> <p>
                                                    We want to inform you that whenever you
                                                    use our Service, in a case of an error in the app
                                                    We collect data and information (through third-party
                                                    products) on your phone called Log Data. This Log Data may
                                                    include information such as your device Internet Protocol
                                                    (“IP”) address, device name, operating system version, the
                                                    configuration of the app when utilizing our Service,
                                                    the time and date of your use of the Service, and other
                                                    statistics.
                                                  </p> <p><h4 class="title">Cookies</h4></p> <p>
                                                    Cookies are files with a small amount of data that are
                                                    commonly used as anonymous unique identifiers. These are sent
                                                    to your browser from the websites that you visit and are
                                                    stored on your device's internal memory.
                                                  </p> <p>
                                                    This Service does not use these “cookies” explicitly. However,
                                                    the app may use third-party code and libraries that use
                                                    “cookies” to collect information and improve their services.
                                                    You have the option to either accept or refuse these cookies
                                                    and know when a cookie is being sent to your device. If you
                                                    choose to refuse our cookies, you may not be able to use some
                                                    portions of this Service.
                                                  </p> <p><h4 class="title">Service Providers</h4></p> <p>
                                                    We may employ third-party companies and
                                                    individuals due to the following reasons:
                                                  </p> <ul><li>To facilitate our Service;</li> <li>To provide the Service on our behalf;</li> <li>To perform Service-related services; or</li> <li>To assist us in analyzing how our Service is used.</li></ul> <p>
                                                    We want to inform our users that these third parties have access to their Personal
                                                    Information. The reason is to perform the tasks assigned to
                                                    them on our behalf. However, they are obligated not to
                                                    disclose or use the information for any other purpose.
                                                  </p> <p><h4 class="title">Security</h4></p> <p>
                                                    We value your trust in providing us your
                                                    Personal Information, thus we are striving to use commercially
                                                    acceptable means of protecting it. But remember that no method
                                                    of transmission over the internet, or method of electronic
                                                    storage is 100% secure and reliable, and we cannot
                                                    guarantee its absolute security.
                                                  </p> <p><h4 class="title">Links to Other Sites</h4></p> <p>
                                                    This Service may contain links to other sites. If you click on
                                                    a third-party link, you will be directed to that site. Note
                                                    that these external sites are not operated under Upview.
                                                    Therefore, We strongly advise you to review the
                                                    Privacy Policy of these websites. We have
                                                    no control over and assume no responsibility for the content,
                                                    privacy policies, or practices of any third-party sites or
                                                    services.
                                                  </p> <p><h4 class="title">Child Privacy</h4></p> <div><p>
                                                      These Services does not address anyone under the age of 13.
                                                      We do not knowingly collect personally
                                                      identifiable information from children under 13 years of age. In the case
                                                      we discover that a child under 13 has provided
                                                      us with personal information, we immediately
                                                      delete this from our servers. If you are a parent or guardian
                                                      and you are aware that your child has provided us with
                                                      personal information, please contact us so that
                                                      we are able to take necessary actions.
                                                    </p></div> <!----> <p><h4 class="title">Changes to This Privacy Policy</h4></p> <p>
                                                    We may update our Privacy Policy from
                                                    time to time. Thus, you are advised to review this page
                                                    periodically for any changes. We will
                                                    notify you of any changes by posting the new Privacy Policy on
                                                    this page.
                                                  </p> <p>This policy is effective as of July 2022.</p> <p><h4 class="title">Contact Us</h4></p> <p>
                                                    If you have any questions or suggestions about Upview's
                                                    Privacy Policy, do not hesitate to contact us at info@upview.in.
                                                  </p> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End Privacy Policy Area-->



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
									<li><a href="#">Blog</a></li>
									<li><a href="#">Members</a></li>
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



</body>

</html>
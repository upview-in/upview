<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<title>Upview</title>

	<!-- responsive meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<meta http-equiv="Cache-control" content="public">

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


	<!-- stylesheet git globe -->
	<link rel="stylesheet" href="{{ asset('main/gitasset/primer-856885a5a549.css') }}">
	<link rel="stylesheet" href="{{ asset('main/gitasset/site-7b08dc8b1766.css') }}">
	<link rel="stylesheet" href="{{ asset('main/gitasset/home-e461cf7ec7b7.css') }}">

	<script src="{{ asset('main/gitasset/webgl-globe-f61153182664.js') }}"></script>


	<!-- new testimonial cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/assets/owl.carousel.min.css'>
	<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.css'>
	<link rel="stylesheet" href="{{ asset('main/assets/testimonial/style.css') }}">

	<link rel="stylesheet" href="{{ asset('main/assets/css/style.css') }}" />
	<link rel="stylesheet" href="{{ asset('main/assets/css/responsive.css') }}" />
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('main/assets/images/favicon/apple-touch-icon.png') }}" />
	<link rel="icon" type="image/svg+xml" href="{{ asset('main/assets/images/favicon/favico.svg') }}" sizes="32x32" />
	<link rel="icon" type="image/svg+xml" href="{{ asset('main/assets/images/favicon/favico.svg') }}" sizes="16x16" />


	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-GR19Q9R87T"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-GR19Q9R87T');
	</script>

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
											<li class="current"><a href="{{ route('main.index') }}">Home</a></li>
											<li><a href="{{ route('main.videos') }}">Videos</a></li>
											<li class="dropdown">
												<a href="javascript:void();">Solutions</a>
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
											<li><a href="{{ route('login') }}">login</a></li>
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
							<a href="{{ route('main.index') }}" class="img-responsive"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" title="" /></a>
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
				<div class="close-btn">
					<span class="icon fa fa-times-circle"></span>
				</div>
				<nav class="menu-box">
					<div class="nav-logo">
						<a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="150px" height="50px" alt="" title="" /></a>
					</div>
					<div class="menu-outer">
						<!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
					</div>
					<a class="btn-one m-4" href="{{ route('register') }}">
						<span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
					</a>
					<!--Social Links-->
					<div class="social-links">
						<ul class="clearfix">
							<li>
								<a href="https://www.facebook.com/upviewIndia/"><span class="fab fa fa-facebook-square"></span></a>
							</li>
							<li>
								<a href="https://twitter.com/upview_in"><span class="fab fa fa-twitter-square"></span></a>
							</li>
							<li>
								<a href="https://www.linkedin.com/showcase/upview-india"><span class="fab fa fa-linkedin-square"></span></a>
							</li>
							<li>
								<a href="https://instagram.com/upview.in?igshid=YmMyMTA2M2Y="><span class="fab fa fa-instagram"></span></a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
			<!-- End Mobile Menu -->
		</header>

		<!-- Start Main Slider -->
		<section class="main-slider style3">
			<div class="header-social-link-1">
				<ul class="clearfix">
					<li class="wow slideInDown" data-wow-delay="500ms" data-wow-duration="1500ms">
						<a href="https://www.facebook.com/upviewIndia/" target="_blank"><i class="fa fa-facebook" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="400ms" data-wow-duration="2000ms">
						<a href="https://twitter.com/upview_in" target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="300ms" data-wow-duration="2500ms">
						<a href="https://www.linkedin.com/showcase/upview-india" target="_blank"><i class="fa fa-linkedin" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="200ms" data-wow-duration="3000ms">
						<a href="https://instagram.com/upview.in" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="200ms" data-wow-duration="3000ms">
						<a href="https://instagram.com/upview.in" target="_blank"><i class="fa fa-youtube" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
				</ul>
			</div>
			<div class="slider-box">
				<!-- Banner Carousel -->
				<main class="font-mktg">
					<div class="overflow-hidden">
						<div class="home-hero-container position-relative js-webgl-globe-data">
							<div class="home-hero position-absolute z-1 top-0 right-0 bottom-0 left-0 overflow-hidden">
								<div class="d-flex flex-column flex-justify-between mx-auto container-xl p-responsive pb-md-9">

									<div class="d-flex gutter gutter-spacious flex-column flex-lg-row flex-items-center height-full px-0 px-lg-3">
										<div class="ml-md-n3 mr-md-3 col-12 col-lg-6 text-center text-md-left">
											<h1 class="h3-mktg color-text-white mb-3 position-relative z-2" style="color: #ffffff;">
												<span class="magic" id="randomTagLine"></span>
											</h1>
											<p class="f2-mktg text-normal text-gray-light-mktg mr-lg-n4 mb-4 position-relative z-2" id="randomBottomTagLine">
											</p>
											<div class="btns-box">
												<a class="btn-one" href="{{ route('register') }}">
													<div class="border_line">
														<img src="{{ asset('main/assets/images/shape/button-border.png') }}" alt="" />
													</div>
													<span class="txt">Free Demo<i class="flaticon-plus-1 plusicon"></i></span>
												</a>
											</div>

										</div>

										<div class="col-12 col-lg-6 text-center text-md-left position-relative">
											<div class="home-globe-container home-globe-container-webgl">
												<div class="mx-auto width-full mt-n9 mt-lg-2 home-globe position-relative height-full js-webgl-globe">
													<video width="700" height="700" loop="" muted="" playsinline="" autoplay preload="none" style="margin-left:10%;" class="home-globe-container-video js-globe-fallback-video ">
														<!-- <source type="video/mp4; codecs=hevc,mp4a.40.2"
															src="images/modules/site/home/globe-900.hevc.mp4"> -->
														<source type="video/mp4; codecs=avc1.4D401E,mp4a.40.2" src="{{ asset('main/images/modules/site/home/globe-900.h264.mp4') }}">
													</video>
													<video loop="" muted="" playsinline="" preload="none" autoplay class="home-globe-container-video js-globe-fallback-video-small" hidden>
														<!-- <source type="video/mp4; codecs=hevc,mp4a.40.2"
															src="images/modules/site/home/globe-500.hevc.mp4"> -->
														<source type="video/mp4; codecs=avc1.4D401E,mp4a.40.2" src="{{ asset('main/images/modules/site/home/globe-500.h264.mp4') }}">
													</video>
													<img srcset="{{ asset('main/images/modules/site/home/globe-700.jpg')}} 700w, {{ asset('main/images/modules/site/home/globe.jpg') }} 1400w" sizes="(max-width: 700px) 70vw, 700px" src="{{ asset('main/images/modules/site/home/globe.jpg') }}" alt="Upview power of collecting data from the globe" class="width-full height-auto js-globe-fallback-image" loading="lazy" decoding="async" width="1238" height="1404" hidden>

													<canvas width="900" height="900" class="webgl-canvas js-globe-canvas" style="display: block; width: 900px; height: 900px;"></canvas>
												</div>
											</div>

										</div>

									</div>
								</div>

								<video loop="" muted="" playsinline="" preload="none" class="js-globe-aurora position-absolute top-0 left-0 right-0 bottom-0" style="margin: auto; z-index: -1; min-width: 100%; min-height: 100%;" hidden="">
									<source type="video/mp4; codecs=avc1.4D401E,mp4a.40.2" src="{{ asset('main/images/modules/site/home/aurora.h264.mp4') }}">
								</video>
							</div>

							<!-- placeholder for mascot image -->
							<div class="position-absolute width-full color-bg-default" style="bottom: -4rem;">
								<div class="container-xl p-responsive">
									<div class="d-flex flex-justify-center flex-lg-justify-end color-bg-default">
										<div class="col-8 col-sm-7 col-md-6 col-lg-5 position-relative z-2 right-lg-n12 events-none">
											<picture>
												<source srcset="{{ asset('main/images/modules/site/home/astro-mona.webp') }}" type="image/webp">
												<img src="{{ asset('main/images/modules/site/home/astro-mona.svg') }}" width="960" height="967" class="home-astro-mona width-full position-absolute bottom-0 height-auto" alt="">
											</picture>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="mx-auto container-xl p-responsive py-8 py-md-9 overflow-hidden d-flex gutter gutter-spacious js-build-in-trigger" data-build-margin-bottom="20">
						</div>

					</div>
				</main>
			</div>
		</section>
		<!-- End Main Slider -->

		<!--Start Service Style3 Area-->
		<section class="service-style3-area" id="our-services">
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<h3>Our Services</h3>
					</div>
					<h2>
						Take Social Media Management to the next level
					</h2>
				</div>
				<div class="row">
					<!--Start Single Service Style3-->
					<div class="col-xl-6 col-lg-6 col-md-6">
						<div class="single-service-style3 text-center">
							<div class="icon">
								<img src="{{ asset('main/assets/images/icon/services/calendar.gif') }}" style="height: 70px;" alt="" />
							</div>
							<div class="title">
								<h3>
									<a href="{{ route('main.socialPosting') }}">Make publishing easy</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Individually updating every social channel you handle is error-prone and time-consuming. On UPVIEW, you hit publish once and watch as all your channels get updated. You can even schedule your posts to a time when your content gets higher engagement.
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
								<img src="{{ asset('main/assets/images/icon/services/pie-chart.gif') }}" style="height: 70px;" alt="" />
							</div>
							<div class="title">
								<h3>
									<a href="{{ route('main.socialAnalytics') }}">Take Strategic decisions backed by data</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Take the guesswork out of decision-making by building your social media strategy based on actual audience behavior. UPVIEW’s intuitive dashboard presents actionable insights based on social data. You can also generate visual reports for your team effortlessly.
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
								<img src="{{ asset('main/assets/images/icon/services/hacking.gif') }}" style="height: 70px;" alt="" />
							</div>
							<div class="title">
								<h3>
									<a href="{{ route('main.socialListening') }}">Tune in to social conversations</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Keep up with consumer opinions, track competitors, and maintain brand health with our advanced Social Listening tool. Our sentiment analysis provides real-time updates and identifies key influencers driving conversations about your brand on the web.
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
								<img src="{{ asset('main/assets/images/icon/services/balance.gif') }}" style="height: 70px;" alt="" />
							</div>
							<div class="title">
								<h3>
									<a href="{{ route('main.socialListening') }}">Build a loyal brand following</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Consumers reward brands that deliver content tailored to their preferences. By putting powerful tools at your disposal, UPVIEW helps you understand your audience, track the competition, and study market trends that always keep you one step ahead.
									</p>
								</div>
							</div>
						</div>
					</div>
					<!--End Single Service Style3-->
				</div>
			</div>
		</section>
		<!--End Service Style3 Area-->

		<!--Start SKill style1 Area-->
		<section class="skill-style1-area" id="about-us">
			<div class="container">
				<div class="row">
					<div class="col-xl-5">
						<div class="skill-style2_image-box-outer" style="margin-right: -250px;margin-left: 0px;left: -110px;top: -50px;">
							<div class="skill-style1_image-box skill-style2_image-box" style="background-image: url( {{ asset('main/assets/images/resources/about.png') }} );"></div>
						</div>
					</div>

					<div class="col-xl-7">
						<div class="skill-style1_content-box skill-style2_content-box" style="padding-top: 2px;">
							<h2>
								About Us
							</h2>
							<p>
								Creators and brands who develop a large following and engagement on social media platforms put their audience at the heart of all decisions. They use social media not just to talk to consumers but also to listen to them.<br /><br />

								At UPVIEW, we are building tools for creators, agencies, and marketers that enable these
								two-way conversations. That’s why we have brought together all the essential tools you
								need to push content and measure performance under one roof.<br /><br />

								We are a team of engineers and marketers based in Mumbai passionate about bringing
								advanced technology to a broader group of people and companies. We are constantly adding
								more capabilities to UPVIEW so that everyone can harness the true power of social media.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End SKill style1 Area-->

		<!--Start Testimonial style1 Area-->
		<section class="testimonial-section" id="testimonial">
			<div class="large-container">
				<div class="sec-title">
					<h2>This is what the <span style="color: #0e52dd;">Upview</span> family has to say!</h2>
				</div>

				<div class="testimonial-carousel owl-carousel owl-theme">
					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="text">I have used more than three platforms before. But Upview provides the best combination of features that simply work. Count me in as a permanent user of Upview!</div>
							<div class="info-box">
								<div class="thumb"><img src="{{ asset('main/assets/images/testimonial/viral.jpg') }}" alt=""></div>
								<h4 class="name">Viral Rathod</h4>
								<span class="designation">B99 Esports</span>
							</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="text">I was struggling to keep with updating my social channels. But now I can batch my publishing and schedule the content to go up in the future. And to add to it, I can assess which content worked for my audience and which did not.</div>
							<div class="info-box">
								<div class="thumb"><img src="{{ asset('main/assets/images/testimonial/chavda.jpg') }}" alt=""></div>
								<h4 class="name">Siddhantraj Chavda</h4>
								<span class="designation">Digital Marketer</span>
							</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="text">One issue I was facing with other applications is that they are limited to just one or two platforms and I use several different platforms to post on Youtube, Instagram, Facebook, LinkedIn & Twitter. Upview not only removed all these hassles but saved me a lot of time as well.</div>
							<div class="info-box">
								<div class="thumb"><img src="{{ asset('main/assets/images/testimonial/firdaus.jpeg') }}" alt=""></div>
								<h4 class="name">Firdaus Shaikh</h4>
								<span class="designation">Social Media Manager</span>
							</div>
						</div>
					</div>

					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="text">My employer is totally dependent on the research I do and the data I acquire. Upview's smart social listening reduces my research time by days if not weeks. Put in a tracker and let Upview work on its own. The single button export feature is also awesome.</div>
							<div class="info-box">
								<div class="thumb"><img src="{{ asset('main/assets/images/testimonial/jinay.jpeg') }}" alt=""></div>
								<h4 class="name">Jinay Shah</h4>
								<span class="designation">Sr. Consultant at Praxis Global Alliance, Mumbai</span>
							</div>
						</div>
					</div>
				</div>

				<div class="thumb-layer paroller">
					<figure class="image"><img src="{{ asset('main/assets/images/testimonial/user-thumbs.png') }}" alt="">
					</figure>
				</div>
			</div>
		</section>
		<!--End Testimonial Style1 Area-->

		<!--Start About Style2 Area-->
		<section class="about-style2-area">
			<div class="container">
				<div class="sec-title text-center">
					<h2>
						UP YOUR GAME WITH UPVIEW
					</h2>
				</div>
				<div class="row">
					<div class="col-xl-6">
						<div class="about-style1_image-box about-style2_image-box clearfix">
							<div class="image-box left">
								<div class="single-box image-box1">
									<div class="inner">
										<img src="{{ asset('main/assets/images/about/abt-1.png') }}" alt="" />
									</div>
								</div>
							</div>
							<div class="image-box right">
								<div class="single-box image-box2">
									<div class="inner">
										<img src="{{ asset('main/assets/images/about/abt-2.png') }}" style="height: 270px;" alt="" />
									</div>
								</div>
								<div class="single-box image-box3">
									<div class="inner">
										<img src="{{ asset('main/assets/images/about/abt-3.png') }}" alt="" />
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-6">
						<div class="about-style1_content-box about-style2_content-box">
							<h2>
								Creators & Influencers
							</h2>
							<div class="text">
								<p>
									UPVIEW gives you the tools to publish content to your social channels quickly. Plan your content strategy by understanding your audience's behavior and preferences through our analytics.
								</p>
							</div>
							<h2>
								Agencies
							</h2>
							<div class="text">
								<p>
									Manage multiple brands with UPVIEW’s intuitive interface. Go granular in studying your audience and adjusting your strategy based on real-time numbers. Align teams through easy-to-generate reports.
								</p>
							</div>
							<h2>
								Companies
							</h2>
							<div class="text">
								<p>
									Social media is not just a tool for branding and marketing. Understanding your consumers and listening to their conversations can deeply impact product development and CRM.
								</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End About Style2 Area-->

		<!--Start Fact Counter Area-->
		<section class="fact-counter-area">
			<div class="container">
				<div class="row">
					<div class="col-xl-12">
						<div class="fact-counter_box">
							<ul class="clearfix">
								<li class="single-fact-counter wow slideInLeft" data-wow-delay="200ms" data-wow-duration="1500ms">
									<div class="border-box"></div>
									<div class="outer-box">
										<div class="count-outer count-box">
											<span class="count-text" data-speed="3000" data-stop="302">0</span>
										</div>
										<div class="title">
											<h6 style="color: #FFF;">Happy Customers</h6>
										</div>
									</div>
								</li>
								<li class="single-fact-counter wow slideInLeft" data-wow-delay="500ms" data-wow-duration="1500ms">
									<div class="border-box"></div>
									<div class="outer-box">
										<div class="count-outer count-box">
											<span class="count-text" data-speed="3000" data-stop="14">0</span><span>M+</span>
										</div>
										<div class="title">
											<h6 style="color: #FFF;">Pages Crawled</h6>
										</div>
									</div>
								</li>
								<li class="single-fact-counter wow slideInRight" data-wow-delay="500ms" data-wow-duration="1500ms">
									<div class="border-box"></div>
									<div class="outer-box">
										<div class="count-outer count-box">
											<span class="count-text" data-speed="3000" data-stop="100">0</span><span>K+</span>
										</div>
										<div class="title">
											<h6 style="color: #FFF;">Influencer's Reached</h6>
										</div>
									</div>
								</li>
								<li class="single-fact-counter wow slideInRight" data-wow-delay="200ms" data-wow-duration="1500ms">
									<div class="border-box"></div>
									<div class="outer-box">
										<div class="count-outer count-box">
											<span class="count-text" data-speed="3000" data-stop="335">0</span>
										</div>
										<div class="title">
											<h6 style="color: #FFF;">Posts Published</h6>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Fact Counter Area-->

		<!--Start Working process area -->
		<section class="working-process-area">
			<div class="auto-container">
				<div class="working-process-bg">
					<video autoplay muted loop preload="none">
						<source src="{{ asset('main/assets/images/video/tweet.mp4') }}" type="video/mp4" />
					</video>
				</div>
				<div class="row">
					<div class="col-xl-12">
						<div class="working-process-inner" style="height: 6in;">
							<div class="title">
								<h2 style="color: #ffffff; font-size: 30px; margin-top: -70px;">Everyone has different needs. That’s why we have developed three pricing plans. Pay for the features that suit your needs. Get in touch with us for a customized plan.</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Working process area -->

		<!--Start Blog Style1 Area-->
		<section class="blog-style1-area" id="blogs">
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<h3>Blogs</h3>
					</div>
					<h2>
						Insights, tactics, and developments from the world of social media
					</h2>
				</div>
				<div class="row text-right-rtl owl-carousel owl-theme portfolio-carousel ">
					<!--Start Single blog Style1-->
					@foreach($blogs as $blog)
					<div class="col-xl-12 col-lg-12">
						<div class="single-blog-style1 wow fadeInUp" data-wow-duration="1500ms">
							<div class="img-holder">
								<div class="inner">
									@if( !is_null($blog->poster) )
									<img src="{{ $blog->poster->getFirstMediaUrl() }}" alt="" />
									@else
									<img src="{{ asset('main/assets/images/blog/bog.png') }}" alt="" />
									@endif
								</div>
								<div class="shape">
									<img src="{{ asset('main/assets/images/shape/blog-shape-1.png') }}" alt="" />
								</div>
							</div>
							<div class="text-holder">
								<h3 class="blog-title">
									<a href="{{ route('main.blog', $blog->id) }}">{{ $blog->title }}</a>
								</h3>
								<div class="text">
									{!! $blog->blog_description !!}
								</div>
								<div class="bottom-box">
									<div class="btns-box">
										<a class="btn-one" href="{{ route('main.blog', $blog->id) }}">
											<div class="border_line">
												<img src="{{ asset('main/assets/images/shape/button-border.png') }}" alt="" />
											</div>
											<div class="left_round"></div>
											<div class="right_round"></div>
											<span class="txt">Read More<i class="flaticon-plus-1 plusicon"></i></span>
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
					<!--End Single blog Style1-->

				</div>
			</div>
		</section>
		<!--End Blog Style1 Area-->

		<!--Start Partner Area-->
		<!-- to do code once live -->
		<!--End Partner Area-->

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
											&copy;Copywright <a href="#">@Neomobile Advertising LLP.</a> All
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


	<!-- new testimonial script -->
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.1/owl.carousel.min.js'></script>
	<script src="{{ asset('main/assets/testimonial/script.js') }}"></script>

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
			var taglines = [
				"Tap into the power of social media",
				"The all-in-one social media management tool",
				"Adding intelligence to social media management"
			];

			var bottomTaglines = [
				"A suite of products to streamline publishing, build data-backed strategies, and develop audience intelligence via social listening.",
				"Grow your brand online with UPVIEW’s powerful Publishing, Analytics, and Social Listening features.",
				"Build, protect, and grow your brand online with UPVIEW’s powerful Publishing, Analytics, and Social Listening features."
			];

			$("#randomTagLine").html(taglines[Math.floor(Math.random() * taglines.length)]);
			$("#randomBottomTagLine").html(bottomTaglines[Math.floor(Math.random() * bottomTaglines.length)]);
		});
	</script>
</body>

</html>
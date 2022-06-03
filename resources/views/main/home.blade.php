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
										</ul>
									</div>
								</nav>
								<!-- Main Menu End-->
							</div>
						</div>

						<div class="header-three_right">
							<div class="btns-box">
								<a class="btn-one" href="{{ route('login') }}">
									<span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
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
							<a class="btn-one ml-4 m-4" href="{{ route('main.index') }}">
								<span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
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
					<a class="btn-one m-4" href="{{ route('login') }}">
						<span class="txt">Login<i class="flaticon-plus-1 plusicon"></i></span>
					</a>
					<!--Social Links-->
					<div class="social-links">
						<ul class="clearfix">
							<li>
								<a href="https://www.facebook.com/upviewIndia/"><span class="fab fa fa-facebook-square"></span></a>
							</li>
							<li>
								<a href="https://twitter.com/UpviewIndia"><span class="fab fa fa-twitter-square"></span></a>
							</li>
							<li>
								<a href="https://www.linkedin.com/showcase/upview-india"><span class="fab fa fa-linkedin-square"></span></a>
							</li>
							<li>
								<a href="https://instagram.com/upviewindia?igshid=YmMyMTA2M2Y="><span class="fab fa fa-instagram"></span></a>
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
						<a href="https://twitter.com/UpviewIndia" target="_blank"><i class="fa fa-twitter" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="300ms" data-wow-duration="2500ms">
						<a href="https://www.linkedin.com/showcase/upview-india" target="_blank"><i class="fa fa-linkedin" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
					</li>
					<li class="wow slideInDown" data-wow-delay="200ms" data-wow-duration="3000ms">
						<a href="https://instagram.com/upviewindia" target="_blank"><i class="fa fa-instagram" aria-hidden="true" style="transform: rotate(265deg);"></i></a>
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
													<img srcset="{{ asset('main/images/modules/site/home/globe-700.jpg')}} 700w, {{ asset('main/images/modules/site/home/globe.jpg') }} 1400w" sizes="(max-width: 700px) 70vw, 700px" src="{{ asset('main/images/modules/site/home/globe.jpg') }}" alt="Planet earth with visualization of GitHub activity crossing the globe" class="width-full height-auto js-globe-fallback-image" loading="lazy" decoding="async" width="1238" height="1404" hidden>

													<canvas width="900" height="900" class="webgl-canvas js-globe-canvas" style="display: block; width: 900px; height: 900px;"></canvas>
												</div>
											</div>

										</div>

									</div>
								</div>

								<!-- <img src="{{ asset('main/images/modules/site/home/hero-glow.svg') }}" alt="" class="position-absolute home-hero-glow events-none z-1"> -->
								<video loop="" muted="" playsinline="" preload="none" class="js-globe-aurora position-absolute top-0 left-0 right-0 bottom-0" style="margin: auto; z-index: -1; min-width: 100%; min-height: 100%;" hidden="">
									<source type="video/mp4; codecs=avc1.4D401E,mp4a.40.2" src="{{ asset('main/images/modules/site/home/aurora.h264.mp4') }}">
								</video>
							</div>

							<!-- placeholder for mascot image -->
							<!-- <div class="position-absolute width-full color-bg-default" style="bottom: -4rem;">
								<div class="container-xl p-responsive">
									<div class="d-flex flex-justify-center flex-lg-justify-end color-bg-default">
										<div class="col-8 col-sm-7 col-md-6 col-lg-5 position-relative z-2 right-lg-n12 events-none">
											<picture>
												<source srcset="{{ asset('main/images/modules/site/home/astro-mona.webp') }}" type="image/webp">
												<img src="{{ asset('main/images/modules/site/home/astro-mona.svg') }}" width="960" height="967" class="home-astro-mona width-full position-absolute bottom-0 height-auto" alt="Mona looking at GitHub activity across the globe">
											</picture>
										</div>
									</div>
								</div>
							</div> -->

						</div>

						<div class="mx-auto container-xl p-responsive py-8 py-md-9 overflow-hidden d-flex gutter gutter-spacious js-build-in-trigger" data-build-margin-bottom="20">
						</div>

					</div>
				</main>
			</div>
		</section>
		<!-- End Main Slider -->

		<!--Start Service Style3 Area-->
		<section class="service-style3-area">
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<h3>Our Services</h3>
					</div>
					<h2>
						Better Discussions, Greater Conversions.<br />We offer solutions for everyone – Startups, Brands, Ad-Agencies & Influencers.
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
									<a href="{{ route('main.socialPosting') }}">Scheduling & Publishing</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										With Upview, it’s so easy to publish on multiple social media channels with automated scheduling. Get an overview of your schedule and get teams working efficiently. You don’t even need to be in the office when you can drive everything remotely. Smooth and streamlined collaboration gets your team working in harmony without publishing delays, setbacks, or mistakes.
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
									<a href="{{ route('main.socialAnalytics') }}">Analytics </a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Access Next-Gen Intelligence.End the guesswork when defining your strategy.Have your marketing strategies mapped instantly to drive engaging and conversion-boosting campaigns. Understand the behaviors, demographics, and influencers of your audience. With Upview, it now takes only seconds to gather all the crucial insights in one place. Complex strategy decisions are now much simpler.
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
									<a href="{{ route('main.socialListening') }}">Social Listening</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										Eavesdrop into the social conversation with social listening. Upview gives marketers a clear view of the most important trends and opportunities for their brands. Get a clear picture to stand up against your competition. You can count on Upview to reveal what other brands do to succeed and in-depth sentiment analysis to help you understand your campaign's performance globally.
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
									<a href="{{ route('main.socialListening') }}">Brand Analysis</a>
								</h3>
								<div class="border-box"></div>
								<div class="inner-text">
									<p>
										It’s time you put your brand on the right digital path with real-time branding. Stay ahead of the competition. Track every move your competitor makes on social media and measure it's impact. Every post, every hashtag, every reply, every user interaction. It’s all recorded & measured so you can understand exactly what your competition is doing.
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
		<section class="skill-style1-area">
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
								Upview is a listening & analytics company that empowers brands and agencies to optimise the impact of their communication efforts. At Upview, we value quality, creativity, problem-solving, team building, and storytelling to grow your business. Our specialised services answer your most demanding requirements with precision and innovative solutions that deliver relentless growth for your brand.<br /><br />
								Our creative, strategic, and data-driven online advertising will boost your business growth and revenue to place you above the competition. We provide proven and effective marketing services to ensure your company remains competitive now and in the future.
							</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End SKill style1 Area-->

		<!--Start Testimonial style1 Area-->
		<section class="testimonial-section">
			<div class="large-container">
				<div class="sec-title">
					<h2>This is what the <span style="color: #0e52dd;">Upview</span> family has to say!</h2>
				</div>

				<div class="testimonial-carousel owl-carousel owl-theme">
					<!-- Testimonial Block -->
					<div class="testimonial-block">
						<div class="inner-box">
							<div class="text">I must have used more than 3 platforms but have never been more
								satisfied with the features of a platform than with Upview. A permanent
								user of Upview forever!</div>
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
							<div class="text">Upview has been a saviour, I was struggling in keeping up with the
								posting but now I can easily schedule it all together and not have to
								worry about anything. And to add to it, I can assess what was working
								for me and what was not.</div>
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
							<div class="text">One issue I was facing with other applications is that they are limited
								to just one or two platforms and I use several different platforms to
								post on Youtube, Instagram, Facebook, LinkedIn & Twitter. Upview not
								only removed all these hassles but saved a lot of time as well.</div>
							<div class="info-box">
								<div class="thumb"><img src="{{ asset('main/assets/images/testimonial/rashmi.jpg') }}" alt=""></div>
								<h4 class="name">Rashmi Mishra</h4>
								<span class="designation">Actor/Model</span>
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
						We Get You Ready For The Millions Watching You!
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
								<a class="video-popup xoven-video-galler-1" title="Xoven Video Gallery" href="https://vimeo.com/716754349">
									<span class="flaticon-play-button-2 playicon"></span>
								</a>
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
								Improve your social strategy by understanding Metrics that Matter
							</h2>
							<div class="text">
								<p>
									Spend less time on manual tasks and more time connecting with your audience. Billions of conversations take place on social media every day. Those discussions help people to make purchasing decisions and influence public perceptions. Whatever kind of business you’re in, people on social media are talking about your industry, your competitors, and you. If you fail to pay attention, you will miss out on a lot of opportunities. Upview can help you start listening.
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
											<h6 style="color: #FFF;">Brands Build</h6>
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
											<h6 style="color: #FFF;">Expert Team</h6>
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
								<h2 style="color: #ffffff; font-size: 30px; margin-top: -70px;">A social media tool which is all ears into the industry.<br />Start your Upview journey today!</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--End Working process area -->

		<!--Start Blog Style1 Area-->
		<section class="blog-style1-area">
			<div class="container">
				<div class="sec-title text-center">
					<div class="sub-title">
						<h3>Blogs</h3>
					</div>
					<h2>
						Come check these few blogs to get an idea of how eye catching and impeccable your social media
						could look!
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
									<h2>Get in touch, or create an account.</h2>
								</div>
								<div class="button-box">
									<a class="btn-one" href="#">
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
													<a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
									<li>
										<div class="img-holder">
											<img src="{{ asset('main/assets/images/footer/instagram-3.jpg') }}" alt="" />
											<div class="overlay">
												<div class="inner">
													<a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
												</div>
											</div>
										</div>
									</li>
								</ul>

								<div class="bottom-box">
									<ul>
										<li><a href="{{ route('main.privacy-policy') }}">Privacy</a></li>
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
				"Our Skills<br /> Your Growth",
				"Frame Your<br />Social Space",
				"Edge out<br />the Competion"
			];

			var bottomTaglines = [
				"We get you ready for the million watching you.",
				"We are ready to serve you differently.",
				"Be where the world is going.",
				"Creating, rejuvenating, repositioning brands.",
				"Social Media Beyond Expectation."
			];

			$("#randomTagLine").html(taglines[Math.floor(Math.random() * taglines.length)]);
			$("#randomBottomTagLine").html(bottomTaglines[Math.floor(Math.random() * bottomTaglines.length)]);
		});
	</script>
</body>

</html>
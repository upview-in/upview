<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Upview India</title>
	<!-- Modernizr -->
	<script src="js/modernizr.js"></script>
	<!-- Open Sans from Google Webfonts -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300' rel='stylesheet' type='text/css'>
	<!-- Main styles file -->
	<link rel="stylesheet" href="css/styles.css" />
	<!-- Icons via Font Awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css" />
</head>
<body class="color-scheme-neue">
	<!-- Animated background -->
	<canvas id="bg-canvas"></canvas>
	<div class="bg-img" style="width: 100%; height: 100%; position: fixed; background: #0c0a13 url(images/space-bg.jpg) no-repeat center center; background-size: 100% auto; "></div>
	<!-- First screen -->
	<div class="splash">
		<div class="centered-unit">
			<div class="container">
				<!-- Main header -->
				<h1>We do our best to launch soon!</h1>
				<!-- Sub header -->
				<p class="lead">Dealing with some really complicated stuff here.</p>

				<!-- Countdown -->
				<div class="countdown large" style="margin-top: 30px;">
					<a href="{{ route('login') }}"><img src="{{ asset('images/logo/named_logo_white.png') }}" width="40%" height="auto"/> </a>
				</div>
				<!-- Countdown end -->
			</div>
		</div>
	</div>


		<!-- Footer -->
		<div class="footer">
			<div class="container">
				&copy; 2021 All rights reserved.
			</div>
		</div>
		<!-- Footer end -->
	</div>

	<!-- JavaScripts -->
	<script src="js/jquery.js"></script>
	<script src="js/countdown.js"></script>
	<script src="js/bezierCanvas.js"></script>
	<script src="js/notifyMe.js"></script>

	<script type="text/javascript">
	$().ready(function(){

		// Activate countdownTimer plugin on a '.countdown' element
		$(".countdown").countdownTimer({
			// Set the end date for the countdown
			endTime: new Date("April 21, 2014 11:13:00 UTC+0200")
		});


		// Activate notifyMe plugin on a '#notifyMe' element
		$("#notifyMe").notifyMe();


		// Activate bezierCanvas plugin on a #bg-canvas element
		$("#bg-canvas").bezierCanvas({
			maxStyles: 1,
			maxLines: 50,
			lineSpacing: .07,
			spacingVariation: .07,
			colorBase: {r: 120,g: 100,b: 220},
			colorVariation: {r: 50, g: 50, b: 30},
			moveCenterX: 0,
			moveCenterY: 0,
			delayVariation: 3,
			globalAlpha: 0.4,
			globalSpeed:30,
		});




		// Add handler on 'Scroll down to learn more' link
		$().ready(function(){
			$(".overlap .more").click(function(e){
				e.preventDefault();
				$("body,html").animate({scrollTop: $(window).height()});
			});
		});


	});
	</script>
</body>
</html>

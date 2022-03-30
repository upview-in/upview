<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upview</title>
    <!-- favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images/logo/favicon.svg') }} ">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images/logo/favicon.svg') }} ">
    <link rel="shortcut icon" href="{{ asset('images/logo/favicon.svg') }} ">
    <!-- metatag -->
    <meta name="author" content="Rama Hardian" />
    <meta property="og:title" content="Rush - multipurpose personal portfolio bootstrap 5 landing page template" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Rush - multipurpose personal portfolio bootstrap 5 landing page template" />
    <meta property="og:site_name" content="rush template" />
    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Rush - multipurpose personal portfolio bootstrap 5 landing page template">
    <meta name="twitter:description" content="Rush - multipurpose personal portfolio bootstrap 5 landing page template">
    <meta name="twitter:image" content="">
    <meta id="tw_url" name="twitter:url" content="">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('main/css/responsive.css') }}">
</head>

<body>
    <!-- loadder wrap -->
    <div class="loading">
        <div class="box">
            <div class="img-load">Upview</div>
            <div class="progress">
                <div class="line"></div>
            </div>
        </div>
    </div>
    <!-- end loadder wrap -->
    <!-- floating navigation -->
    <nav id="navbar" class="navigation-nav">
        <ul class="menlist">
            <li><a class="nav-link active" href="#home">Home</a></li>
            <li><a class="nav-link" href="#about-section">About</a></li>
            <li><a class="nav-link" href="#portfolio-section">Portfolio</a></li>
            <li><a class="nav-link" href="#service-section">Service</a></li>
            <li><a class="nav-link" href="#contact-section">Contact</a></li>
        </ul>
    </nav>
    <!-- end floating navigation -->
    <div class="mobile-navwrap">
        <nav id="navmobile">
            <ul class="navigation-listmobile">
                <li><a class="nav-link active" href="#home">Home</a></li>
                <li><a class="nav-link" href="#about-section">About</a></li>
                <li><a class="nav-link" href="#portfolio-section">Portfolio</a></li>
                <li><a class="nav-link" href="#service-section">Service</a></li>
                <li><a class="nav-link" href="#contact-section">Contact</a></li>
            </ul>
        </nav>
    </div>
    <!-- header -->
    <header id="wrap-header" class="pt-3">
        <div class="container pl-lg-0">
            <div class="row position-relative">
                <div class="col-lg-12">
                    <div class="wrap-logo">
                        <a class="navbar-brand" href="#header">
                            <span class="d-inline">
                                <img src="{{ asset('images/logo/named_logo_white.png') }}" height="100" width="auto" alt="Upview">
                            </span>
                        </a>
                        <div class="wrap-menunavigation">
                            <div class="wrap-close">
                                <div id="exitmenu"></div>
                            </div>
                            <div class="menu-bar">
                                <span class="lines"></span>
                                <span class="lines"></span>
                                <span class="lines"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- main wrap page -->
    <main>
        <div class="o-line"></div>
        <div class="o-line"></div>
        <div class="o-line"></div>
        <div class="scene"></div>
        <!-- hero -->
        <section id="home" class="sect section1" data-section-name="home">

            <div class="container">
                <div class="row">
                    <div class="col-lg-7 align-items-center justify-content-left d-flex vh-100">
                        <div class="wrap-heroifo gl pb-4 pt-5">
                            <p data-aos="fade-up" data-aos-delay="100" data-aos-offset="0" style="font-size: xxx-large;"><span class="boldi">Upview</span></p>
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0"><span class="boldi">A Powerful tool for social media management</span></h3>
                            <p class="deskrip-info" data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">Easy way to manage socail media and get powerful Analytics.</p>
                            <a href="https://{{ env('APP_DOMAIN') }}" class="btn button mt-3">Get Started</a>
                        </div>
                    </div>
                </div>
                <div class="mainvisual__scroll">
                    <span>EXPLORE</span>
                    <div class="bar"></div>
                </div>
            </div>
        </section>
        <!-- end hero -->
        <!-- about -->
        <section id="about-section" class="sect section2" data-section-name="about-section">

            <div id="wrap-about-section" class="container align-items-center justify-content-left d-flex wrap-container">
                <span class="big-text">FEATURES</span>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="wrap-imgpic " data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                            <!-- <video height="540" width="auto" loop="true" autoplay="autoplay" id="analyticsVid">
                                <source src="{{ asset('main/asset/videos/upview_analytics.mp4') }}" type="video/mp4">
                            </video> -->
                            <img class="gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25" src="{{ asset('main/asset/videos/upview-analytics-unscreen.gif') }}" alt="poto-hero" />
                        </div>
                    </div>
                    <div class="col-lg-7 pr-lg-5">
                        <div class="who-i">
                            <h3 class="pb-3" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0"><span class="boldi mr-2">Profesional</span> Profile</h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit quaerat impedit enim error beatae quibusdam eaque perspiciatis cum cumque voluptatum minima nulla unde expedita, atque, possimus autem minus laboriosam.</p>
                            <p data-aos="fade-up" data-aos-delay="400" data-aos-offset="0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur suscipit quaerat impedit enim error beatae quibusdam eaque perspiciatis cum cumque voluptatum minima nulla unde expedita, atque, possimus autem minus laboriosam.</p>
                            <a href="#" class="btn button mt-3">DOWNLOAD CV</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about -->
        <!-- portfolio -->
        <section id="portfolio-section" class="sect section3" data-section-name="portfolio-section">

            <div class="container wrap-container text-center">
                <span class="big-text">SERVICES</span>
                <div class="row justify-content-center pb-5 mb-5">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">My<span class="boldi ml-2">Work</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">Some of my profesional work for my client</p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="porto-wrap text-left" data-aos="fade-up" data-aos-delay="600" data-aos-offset="0">
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="100" data-tilt-max="10">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/1.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/1.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/2.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/2.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/3.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/3.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/4.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/4.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/5.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/5.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <!-- portfolio item -->
                            <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/6.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/6.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <a href="#" class="btn button mt-3">MORE SHOWCASE</a>
                    </div>
                </div>
            </div>
            </div>
        </section>
        <!-- end portfolio -->
        <!-- service section  -->
        <section id="service-section" class="sect section4" data-section-name="service-section">

            <div class="container wrap-container">
                <span class="big-text">SERVICES</span>
                <div class="row justify-content-center pb-5 mb-5">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">What <span class="boldi ml-2">I Do</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                                What i'm offers to get your project done
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/statistics.png') }}" height="100px" alt="poto-hero"></em>
                            <h3>Social Media Analytics</h3>
                            <p class="mt-3">
                                Social media analytics is the ability to gather and find meaning in data gathered from social channels to support business decisions — and measure the performance of actions based on those decisions through social media
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/automation.png') }}" height="100px" alt="poto-hero"></em>
                            <h3>Social Media Automation</h3>
                            <p class="mt-3">
                                Automating social media activities to optimize the results derived from social media channels, that helps marketers save time and effort spent on managing social platforms, engaging with prospects and enhancing brand awareness.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/seo.png') }}" height="100px" alt="poto-hero"></em>
                            <h3>SEO Consultancy</h3>
                            <p class="mt-3">
                                Upview Provides insights that are responsible for planning, implementing and managing company client’s overall SEO strategy.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/analytics.png') }}" height="100px" alt="poto-hero"></em>
                            <h3>Social Listening</h3>
                            <p class="mt-3">
                                Social listening is the process of identifying and assessing what is being said about a company, individual, product or brand on the internet.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service section -->
        <!-- testimonials -->
        <section id="testimonial-wrap">
            <div class="container wrap-container">
                <span class="big-text">PEOPLE SAY</span>
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">What <span class="boldi ml-2">They Say</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                                words from some satisfied clients
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-11 pt-5">
                        <div id="wrap-testimonial" class="keen-slider">
                            <!-- testimoni item -->
                            <div class="item-testi keen-slider__slide">
                                <div class="wrap-comment">
                                    <blockquote>
                                        <i class="fa fa-quote-left left-o" aria-hidden="true"></i>
                                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae dolorem, eligendi dignissimos, sit a incidunt nam exercitationem veniam fugit ex.</h4>
                                    </blockquote>
                                    <h5>Mba Lauren <span>, CEO PT UDAR IDER</span></h5>


                                </div>
                                <div class="detail-user text-center text-sm-start">
                                    <img src="asset/user/2.jpg" class="img-fluid" alt="user" />
                                </div>
                            </div>
                            <!-- testimoni item -->
                            <div class="item-testi keen-slider__slide">
                                <div class="wrap-comment">
                                    <blockquote>
                                        <i class="fa fa-quote-left left-o" aria-hidden="true"></i>
                                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae dolorem, eligendi dignissimos, sit a incidunt nam exercitationem veniam fugit ex.</h4>
                                    </blockquote>
                                    <h5>Jon Muter <span>, CEO PT UDAR IDER</span></h5>
                                </div>
                                <div class="detail-user text-center text-sm-start">
                                    <img src="asset/user/1.jpg" class="img-fluid" alt="user" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- end testimonials -->
        <!-- contact section  -->
        <section id="contact-section" class="sect section6" data-section-name="contact-section">
            <div class="container wrap-container">
                <span class="big-text">CONTACT</span>
                <div class="row justify-content-center pb-5 mb-5">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">Start <span class="boldi ml-2">Convertation</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                                let's discuss your great project idea so that it can become a reality
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 mb-5">
                        <div class="wrap-detailcontact">
                            <p class="mb-5">Let's make something different and more meaningful, make more conceptual</p>
                            <div class="detail-inner">
                                <i class="bi bi-telephone-forward-fill"></i>
                                <p>Phone Call Number</p>
                                <p>+080989999</p>
                            </div>
                            <div class="detail-inner">
                                <i class="bi bi-envelope-fill"></i>
                                <p>Email address</p>
                                <p>yourmail@yourdomain.com</p>
                            </div>
                            <div class="detail-inner">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>Hq address</p>
                                <p>Unnamed Road 77152, jakarta Selatan Indonesia</p>
                            </div>
                            <div class="sosmed-horizontal pt-3">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-contact">
                            <form action="#" id="formcontact">
                                <div class="form-group row formwrap">
                                    <div class="col-lg-6 pt-5">
                                        <label for="yourname">Input your name</label>
                                        <input type="text" id="yourname" placeholder="Your name" name="name" class="mt-3 input-control inputtext " data-name="name" />
                                    </div>
                                    <div class="col-lg-6 pt-5">
                                        <label for="yourmail">Input your mail</label>
                                        <input type="email" id="yourmail" placeholder="Your email address" name="email" class="mt-3 input-control inputtext " data-name="email" />
                                    </div>
                                    <div class="col-lg-12 pt-5">
                                        <label for="comment">Input your message</label>
                                        <textarea class="comentarea mt-3 input-control" id="comment" placeholder="Your comment" data-name="comment" name="comment"></textarea>
                                        <button id="submitbutton" class="submitbuton button mt-5 mb-3" type="submit">Submit now</button>
                                        <div class="contactform__loader pt-3"></div>

                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end contact section  -->
    </main>
    <!-- end main wrap page -->
    <!-- footer -->
    <footer id="footer-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center pb-3">
                    <p>Upview India</p>
                </div>
            </div>
        </div>
    </footer>
    <div class="glasseffect"></div>
    <!-- bootstrap js -->
    <script src="{{ asset('main/javascript/vendor/bootstrap.js') }}"></script>
    <!-- three js module -->
    <script type="module" src="{{ asset('main/javascript/vendor/auora.js') }}"></script>
    <!-- titlt js -->
    <script src=" {{ asset('main/javascript/vendor/titlt.js') }}"></script>
    <!-- glightbox js -->
    <script src=" {{ asset('main/javascript/vendor/glightbox.js') }}"></script>
    <!-- owl  js -->
    <script src=" {{ asset('main/javascript/vendor/keen-slider.js') }}"></script>
    <!-- aos js -->
    <script src=" {{ asset('main/javascript/vendor/aos.js') }}"></script>
    <!-- main js -->
    <script src=" {{ asset('main/javascript/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            document.getElementById('analyticsVid').play();
        });
    </script>
</body>

</html>
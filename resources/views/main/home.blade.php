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
    <meta name="author" content="Upview" />
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
            <li><a class="nav-link" href="#features-section">Features</a></li>
            <!-- <li><a class="nav-link" href="#blog-section">Blogs</a></li> -->
            <li><a class="nav-link" href="#service-section">Service</a></li>
            <li><a class="nav-link" href="#how-to">How to Register</a></li>
            <li><a class="nav-link" href="#contact-section">Contact</a></li>
        </ul>
    </nav>
    <!-- end floating navigation -->
    <div class="mobile-navwrap">
        <nav id="navmobile">
            <ul class="navigation-listmobile">
                <li><a class="nav-link active" href="#home">Home</a></li>
                <li><a class="nav-link" href="#features-section">Features</a></li>
                <!-- <li><a class="nav-link" href="#blog-section">Blogs</a></li> -->
                <li><a class="nav-link" href="#service-section">Service</a></li>
                <li><a class="nav-link" href="#how-to">How to Register</a></li>
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
        <!-- <div class="o-line"></div>
        <div class="o-line"></div>
        <div class="o-line"></div> -->
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
        <section id="features-section" class="sect section2" data-section-name="features-section">
            <div id="wrap-about-section" class="container align-items-center justify-content-left d-flex flex-column wrap-container">
                <span class="big-text" style="top : 0; left: 0; position: relative; transform: none;">KEY FEATURES</span>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="wrap-imgpic " data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                            <img class="gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25" src="{{ asset('main/asset/videos/upview-analytics-unscreen.gif') }}" alt="poto-hero" />
                        </div>
                    </div>
                    <div class="col-lg-7 pr-lg-5">
                        <div class="who-i">
                            <h3 class="pb-3" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0"><span class="boldi mr-2">Social-Media</span> Analytics</h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0" style="font-size: larger;">Gather meaningful data accumulated from multiple social media channels to revamp, support, and evaluate the performance of actions in factors of your convenience. Create strategies that attract the right set of audiences.</p>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-7 pr-lg-5">
                        <div class="who-i">
                            <h3 class="pb-3" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0"><span class="boldi mr-2">Social-Media</span> Listening</h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0" style="font-size: larger;">Identify & assess how your brand is perceived on different social media fronts and the scope of your marketing strategies. Understand your audience in-depth and gauge them by delivering the right content.</p>
                        </div>
                    </div>
                    <div class="col-lg-5">
                        <div class="wrap-imgpic " data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                            <img class="gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25" src="{{ asset('main/asset/videos/upview-analytics-unscreen.gif') }}" alt="poto-hero" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- about -->
        <!-- portfolio -->
        <!-- <section id="blog-section" class="sect section3" data-section-name="blog-section">
            <div class="container wrap-container text-center">
                <span class="big-text" style="top : 0; left: 0; position: relative; transform: none;">BLOGS</span>
                <div class="row">
                    <div class="col">
                        <div class="porto-wrap text-left" data-aos="fade-up" data-aos-delay="600" data-aos-offset="0"> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="100" data-tilt-max="10">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/1.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/1.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/2.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/2.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/3.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/3.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/4.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/4.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
                                <a class="gallery-link glightbox" data-glightbox="type: image" href="{{ asset('main/asset/portfolio/5.jpg') }}">
                                    <img src="{{ asset('main/asset/portfolio/5.jpg') }}" alt="porto-poto" />
                                    <div class="porto-description">
                                        <div class="overlay-holder">
                                            <h3>Pump the kid</h3>
                                            <p>LANDSCAPE 2020 SOMEWHERE</p>
                                        </div>
                                    </div>
                                </a>
                            </div> -->
                            <!-- portfolio item -->
                            <!-- <div class="item-porto gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25">
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
        </section> -->
        <!-- end portfolio -->
        <!-- service section  -->
        <section id="service-section" class="sect section4" data-section-name="service-section">

            <div class="container wrap-container">
                <span class="big-text">SERVICES</span>
                <div class="row justify-content-center pb-5 mb-5">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">What <span class="boldi ml-2">We Do</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                                What We Offer to make your work more simplified
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/statistics.png') }}" height="100px" alt="poto-hero"></em>
                            <h3 class="mt-1">Social Media Analytics</h3>
                            <p class="mt-3" style="font-size: medium;">
                                Gather meaningful data accumulated from multiple social media channels to revamp, support, and evaluate the performance of actions in factors of your convenience. Create strategies that attract the right set of audiences.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/automation.png') }}" height="100px" alt="poto-hero"></em>
                            <h3 class="mt-1">Social Media Automation</h3>
                            <p class="mt-3" style="font-size: medium;">
                                Automate all your social media activities and enhance the results hance derived. Save your time & efforts on creating brand awareness to engage multiple social media fronts simultaneously.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/seo.png') }}" height="100px" alt="poto-hero"></em>
                            <h3 class="mt-1">SEO Consultancy</h3>
                            <p class="mt-3" style="font-size: medium;">
                                Upgrade your SEO strategies by implementing and managing the actionable insights provided by Upview.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4 mt-4 pt-2">
                        <div class="wrap-box">
                            <em><img src="{{ asset('main/asset/images/analytics.png') }}" height="100px" alt="poto-hero"></em>
                            <h3 class="mt-1">Social Listening</h3>
                            <p class="mt-3" style="font-size: medium;">
                                Identify & assess how your brand is perceived on different social media fronts and the scope of your marketing strategies. Understand your audience in-depth and gauge them by delivering the right content.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end service section -->
        <!-- testimonials -->
        <!-- <section id="testimonial-wrap">
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
                        <div id="wrap-testimonial" class="keen-slider"> -->
        <!-- testimoni item -->
        <!-- <div class="item-testi keen-slider__slide">
                                <div class="wrap-comment">
                                    <blockquote>
                                        <i class="fa fa-quote-left left-o" aria-hidden="true"></i>
                                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae dolorem, eligendi dignissimos, sit a incidunt nam exercitationem veniam fugit ex.</h4>
                                    </blockquote>
                                    <h5>Mba Lauren <span>, CEO PT UDAR IDER</span></h5>


                                </div>
                                <div class="detail-user text-center text-sm-start">
                                    <img src="{{ asset('main/asset/user/1.jpg') }}" class="img-fluid" alt="user" />
                                </div>
                            </div> -->
        <!-- testimoni item -->
        <!-- <div class="item-testi keen-slider__slide">
                                <div class="wrap-comment">
                                    <blockquote>
                                        <i class="fa fa-quote-left left-o" aria-hidden="true"></i>
                                        <h4>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae dolorem, eligendi dignissimos, sit a incidunt nam exercitationem veniam fugit ex.</h4>
                                    </blockquote>
                                    <h5>Jon Muter <span>, CEO PT UDAR IDER</span></h5>
                                </div>
                                <div class="detail-user text-center text-sm-start">
                                    <img src="{{ asset('main/asset/user/2.jpg') }}" class="img-fluid" alt="user" />
                                </div>
                            </div> -->
        <!-- </div>
                    </div>
                </div>

            </div>
        </section> -->
        <!-- end testimonials -->
        <!-- how to register -->
        <section id="how-to" class="sect section2" data-section-name="how-to">
            <div id="wrap-about-section" class="container align-items-center justify-content-left d-flex flex-column wrap-container">
                <span class="big-text" style="top : 0; left: 0; position: relative; transform: none;">REGISTER</span>
                <div class="row">
                    <div class="col-lg-5">
                        <div class="wrap-imgpic " data-aos="fade-up" data-aos-delay="500" data-aos-offset="0">
                            <img class="gl" data-tilt-perspective="300" data-tilt-speed="400" data-tilt-max="25" src="{{ asset('main/asset/videos/upview-analytics-unscreen.gif') }}" alt="poto-hero" />
                        </div>
                    </div>
                    <div class="col-lg-7 pr-lg-5">
                        <div class="who-i">
                            <h3 class="pb-3" data-aos="fade-up" data-aos-delay="200" data-aos-offset="0"><span class="boldi mr-2">How To</span> Register ?</h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0"><ul>
                                <li class="boldi" style="font-size: larger;">Step 1: Click On Get Started on the landing Page.</li>
                                <li class="boldi" style="font-size: larger;">Step 2: Click on the <a href="https://{{ env('APP_DOMAIN') }}">signup</a> link.</li>
                                <li class="boldi" style="font-size: larger;">Step 3: Enter the details asked.</li>
                                <li class="boldi" style="font-size: larger;">Step 4: Activate your account by clicking the link sent in mail.</li>
                            </ul></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end how to register -->
        <!-- contact section  -->
        <section id="contact-section" class="sect section6" data-section-name="contact-section">
            <div class="container wrap-container">
                <span class="big-text">CONTACT</span>
                <div class="row justify-content-center pb-5 mb-5">
                    <div class="col-lg-8">
                        <div class="who-i text-center">
                            <h3 data-aos="fade-up" data-aos-delay="200" data-aos-offset="0">Start <span class="boldi ml-2">Convertation</span></h3>
                            <p data-aos="fade-up" data-aos-delay="300" data-aos-offset="0">
                                Take your first step towards building a Social Empire.
                            </p>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 mb-5">
                        <div class="wrap-detailcontact">
                            <p class="mb-5">Tell us what you need, we will deliver what you thought.</p>
                            <div class="detail-inner">
                                <i class="bi bi-telephone-forward-fill"></i>
                                <p>Phone Call Number</p>
                                <p>+91 9324633735</p>
                            </div>
                            <div class="detail-inner">
                                <i class="bi bi-envelope-fill"></i>
                                <p>Email address</p>
                                <p>info@upview.in</p>
                            </div>
                            <div class="detail-inner">
                                <i class="bi bi-geo-alt-fill"></i>
                                <p>Address</p>
                                <p>Mumbai</p>
                            </div>
                            <div class="sosmed-horizontal pt-3">
                                <a href="javascript:void(0);"><i class="fa fa-facebook"></i></a>
                                <a href="javascript:void(0);"><i class="fa fa-instagram"></i></a>
                                <a href="javascript:void(0);"><i class="fa fa-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="form-contact">
                            <form method="POST" action="{{ route('main.contact_us') }}">
                                <div class="form-group row formwrap">
                                    @csrf
                                    <div class="col-lg-6 pt-5">
                                        <label for="txtname">Enter your name</label>
                                        <input type="text" id="txtname" name="txtname" placeholder="Your name" name="name" class="mt-3 input-control inputtext " data-name="name" required />
                                    </div>
                                    <div class="col-lg-6 pt-5">
                                        <label for="txtemail">Enter your mail</label>
                                        <input type="email" id="txtemail" pattern="[a-zA-Z0-9.-_]{1,}@[a-zA-Z.-]{2,}[.]{1}[a-zA-Z]{2,}" name="txtemail" placeholder="Your email address" name="email" class="mt-3 input-control inputtext " data-name="email" required />
                                    </div>
                                    <div class="col-lg-12 pt-5">
                                        <label for="message">Enter your message</label>
                                        <textarea class="comentarea mt-3 input-control" name="txtmessage" id="txtmessage" placeholder="Your comment" data-name="comment" name="comment" required></textarea>
                                        <button class="submitbuton button mt-5 mb-3" type="submit">{{ __('Submit') }}</button>
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
</body>

</html>
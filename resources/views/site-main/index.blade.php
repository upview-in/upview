<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Upview</title>
    <!-- Favicon -->
    <!-- link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> -->

    <!-- <link rel="stylesheet" href="css/vendor/icofont.min.css" />
    <link rel="stylesheet" href="css/plugins/animate.min.css" />
    <link rel="stylesheet" href="css/plugins/swiper-bundle.min.css" />
    <link rel="stylesheet" href="css/plugins/aos.css" />
    <link rel="stylesheet" href="css/plugins/selectric.css" />
    <link rel="stylesheet" href="css/style.css" /> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->

    <!--  Minified  css  -->

    <!--  # vendor min css,plugins min css,style min css -->

    <link rel="stylesheet" href={{ asset("css/vendor/vendor.min.css") }} />
    <link rel="stylesheet" href={{ asset("css/plugins/plugins.min.css") }} />
    <link rel="stylesheet" href={{ asset("css/plugins/aos.css") }} />
    <link rel="stylesheet" href={{ asset("css/plugins/selectric.css") }} />
    <link rel="stylesheet" href={{ asset("css/style.min.css") }} />

</head>

<body>
    <!-- Modal -->
    <div class="modal offcanvas-modal fade" id="offcanvas-modal">
        <div class="modal-dialog offcanvas-dialog">
            <div class="modal-content">
                <div class="modal-header offcanvas-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- offcanvas-menu start -->
                <nav id="offcanvas-menu" class="offcanvas-menu">
                    <ul>
                        <li>
                            <a href={{ route("index-main") }}>Home</a>
                            <!-- add your sub menu here -->
                        </li>
                        <li>
                            <a href={{ route('privacy-policy') }}}}>Services</a>
                        </li>
                        <li>
                            <a href="case-details.html">Case Studies</a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Blog</a>
                            <ul>
                                <li>
                                    <a href="blog-details.html">blog details</a>
                                </li>
                                <li>
                                    <a href="blog-grid-3-column.html">blog grid 3 column</a>
                                </li>
                                <li>
                                    <a href="blog-left-sidebar.html">blog left sidebar</a>
                                </li>
                                <li>
                                    <a href="blog-right-sidebar.html">blog right sidebar</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="javascript:void(0)">Pages</a>
                            <ul>
                                <li><a href="about-us.html">about us</a></li>
                                <li><a href="faq.html">faq</a></li>
                                <li><a href="404.html">404 not found!</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="contact-us.html">Contact</a>
                        </li>
                    </ul>


                </nav>
                <!-- offcanvas-menu end -->

            </div>
        </div>
    </div>

    <header class="header">
        <div id="active-sticky" class="header-bottom">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        <a href="index.html" class="brand-logo">
                            <img src={{ asset("images/logo/upview.png") }} alt="brand logo" />
                        </a>
                    </div>
                    <div class="col-auto">
                        <a class="btn btn-warning btn-hover-warning d-none d-sm-inline-block d-lg-none" href="blog-details.html">Get Started <i class="icofont-arrow-right"></i>
                        </a>

                        <button type="button" class="btn btn-warning offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                            <span class="line"></span>
                            <span class="line"></span>
                            <span class="line"></span>
                        </button>
                        <nav class="d-none d-lg-block">
                            <ul class="main-menu text-end">
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="index.html">Home</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href={{ route('privacy-policy') }}}}>Services</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="case-details.html">
                                        Case Studies
                                    </a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="#">Blog</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a class="sub-menu-link" href="blog-details.html">blog details</a>
                                        </li>
                                        <li>
                                            <a class="sub-menu-link" href="blog-grid-3-column.html">blog grid 3 column</a>
                                        </li>
                                        <li>
                                            <a class="sub-menu-link" href="blog-left-sidebar.html">blog left sidebar</a>
                                        </li>
                                        <li>
                                            <a class="sub-menu-link" href="blog-right-sidebar.html">blog right sidebar</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li>
                                            <a class="sub-menu-link" href="about-us.html">about us</a>
                                        </li>
                                        <li><a class="sub-menu-link" href="faq.html">faq</a></li>
                                        <li>
                                            <a class="sub-menu-link" href="404.html">404 not found!</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="main-menu-item">
                                    <a class="main-menu-link" href="contact-us.html">Contacts</a>
                                </li>
                                <li class="main-menu-item">
                                    <a class="btn btn-warning btn-hover-warning btn-lg" href="#">Get Started <i class="icofont-arrow-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <section class="hero-section">
        <img class="shape shape1" src={{ asset("images/hero/shape1.png") }} alt="img_not_found" />
        <img class="shape shape2" src={{ asset("images/hero/shape2.png") }} alt="img_not_found" />
        <img class="shape particle1" src={{ asset("images/hero/particle1.png") }} alt="img_not_found" />
        <img class="shape particle2" src={{ asset("images/hero/particle2.png") }} alt="img_not_found" />
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-6">
                    <div class="hero-content">
                        <h2 class="title">Top Ranking Your Brand New Website.</h2>
                        <p>
                            <span class="hr d-none d-xl-block"></span> Top rankings is important for online business.
                        </p>
                        <!-- <form action="#" class="hero-form position-relative">
                            <input class="form-control" type="text" placeholder="https://yourwebsite.com" />
                            <button class="btn btn-warning">Free Audit Now</button>
                        </form> -->
                        <img class="particle3" src={{ asset("images/hero/particle3.png") }} alt="particle2" />
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="hero-img">
                        <img class="animate-one" src={{ asset("images/hero/1.png") }} alt="img_not_found" data-aos="zoom-in" data-aos-delay="100" />
                        <div class="position-absolute animate-two">
                            <img data-aos="fade-up" data-aos-delay="600" src={{ asset("images/hero/2.png") }} alt="img_not_found" />
                        </div>

                        <div class="position-absolute animate-three">
                            <img data-aos="fade-down" data-aos-delay="400" src={{ asset("images/hero/3.png") }} alt="img_not_found" />
                        </div>
                    </div>

                    <div class="hero-img-mobile">
                        <img src={{ asset("images/hero/mobile.png") }} alt="images-not_found" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- brand section start -->
    <div class="brand-section section-pb-150" data-aos="fade-up" data-aos-delay="100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="brand-card brand-carousel">
                        <p class="text-center">
                            Trusted by <span class="text-gradient">8,980+</span> of The World's Best Organization.
                        </p>
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src={{ asset("images/brand-logo/1.png") }} alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src={{ asset("images/brand-logo/1.1.png") }} alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src={{ asset("images/brand-logo/2.png") }} alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src={{ asset("images/brand-logo/2.1.png") }} alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src={{ asset("images/brand-logo/3.png") }} alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src={{ asset("images/brand-logo/3.1.png") }} alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src={{ asset("images/brand-logo/4.png") }} alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src={{ asset("images/brand-logo/4.1.png") }}}} alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src={{ asset("images/brand-logo/5.png") }} alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src={{ asset("images/brand-logo/5.1.png") }} alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- brand section start -->

    <!-- service section start -->
    <section class="service-section section-pb-150">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="200">
                    <div class="section-title primary text-center pb-100">
                        <div class="icon">
                            <img src={{ asset("images/icon/sharing.png") }} alt="Icon_not_found" />
                        </div>
                        <h3 class="title">What We Offer</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>
            <div class="row mb-n7">
                <!-- service-card satrt -->
                <div class="col-md-6 mb-7" data-aos="fade-up" data-aos-delay="500">
                    <div class="service-card">
                        <img class="line" src={{ asset("images/service/line-one.png") }} alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around dagnger">
                                <span></span>
                            </div>
                            <img src={{ asset("images/icon/marketing.png") }} alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">Marketing Automation</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the ipsum has been the industry standard ever printer specimen book.
                            </p>
                            <a href="case-details.html" class="btn btn-outline-danger">Details +</a>
                        </div>
                    </div>
                </div>
                <!-- service-card end -->
                <!-- service-card satrt -->
                <div class="col-md-6 mb-7" data-aos="fade-up" data-aos-delay="1000">
                    <div class="service-card">
                        <img class="line" src={{ asset("images/service/line-two.png") }} alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around warning">
                                <span></span>
                            </div>
                            <img src={{ asset("images/icon/analytics.png") }}}} alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">SEO Consultancy</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the ipsum has been the industry standard ever printer specimen book.
                            </p>
                            <a href="case-details.html" class="btn btn-outline-warning">Details +</a>
                        </div>
                    </div>
                </div>
                <!-- service-card end -->
                <!-- service-card satrt -->
                <div class="col-md-6 mb-7" data-aos="fade-up" data-aos-delay="1500">
                    <div class="service-card">
                        <img class="line" src={{ asset("images/service/line-three.png") }} alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around primary">
                                <span></span>
                            </div>
                            <img src={{ asset("images/icon/connect.png") }} alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">Pay Per Click Advertising</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the ipsum has been the industry standard ever printer specimen book.
                            </p>
                            <a href="case-details.html" class="btn btn-outline-primary">Details +</a>
                        </div>
                    </div>
                </div>
                <!-- service-card end -->
                <!-- service-card satrt -->
                <div class="col-md-6 mb-7" data-aos="fade-up" data-aos-delay="2000">
                    <div class="service-card">
                        <img class="line" src={{ asset("images/service/line-foure.png") }}}} alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around secondary">
                                <span></span>
                            </div>
                            <img src={{ asset("images/icon/document.png") }}}} alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">Marketing Automation</h4>
                            <p>
                                Lorem Ipsum is simply dummy text of the ipsum has been the industry standard ever printer specimen book.
                            </p>
                            <a href="case-details.html" class="btn btn-outline-secondary">Details +</a>
                        </div>
                    </div>
                </div>
                <!-- service-card end -->
                <div class="col-12 mb-7 mt-7" data-aos="fade-up" data-aos-delay="1500">
                    <div class="call-to-action text-center">
                        <a href="service-details.html" class="btn btn-warning">All Services <i class="icofont-rounded-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- service section end -->

    <!-- working process section start -->
    <section class="working-process-section">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                    <div class="section-title process text-center pb-100">
                        <div class="icon">
                            <img src={{ asset("images/icon/pencile.png") }}}} alt="Icon_not_found" />
                        </div>
                        <h3 class="title">Working Process</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>

            <div class="row working-process mb-n4">
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="400">
                    <img class="arrow-shape" src={{ asset("images/working/arrow-shape1.png") }} alt="images_not_found" />
                    <div class="icon">
                        <img src={{ asset("images/working/1.png") }}}} alt="images_not_found" />
                    </div>
                    <h4 class="title">Idea Generation</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="500">
                    <img class="arrow-shape" src={{ asset("images/working/arrow-shape2.png") }}}} alt="images_not_found" />
                    <div class="icon">
                        <img src={{ asset("images/working/2.png") }}}} alt="images_not_found" />
                    </div>
                    <h4 class="title">Working Plan</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="600">
                    <img class="arrow-shape" src={{ asset("images/working/arrow-shape1.png") }}}} alt="images_not_found" />
                    <div class="icon">
                        <img src={{ asset("images/working/3.png") }} alt="images_not_found" />
                    </div>
                    <h4 class="title">SEO Research</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="700">
                    <div class="icon">
                        <img src={{ asset("images/working/4.png") }} alt="images_not_found" />
                    </div>
                    <h4 class="title">Launch Project</h4>
                </div>
                <!-- working-process-list end -->
            </div>
        </div>
    </section>
    <!-- working process section end -->

    <!-- about section start -->
    <section class="about-section">
        <img src={{ asset("images/about/bg.png") }}}} alt="images-not_found" class="about-bg" />
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img-content" data-aos="zoom-in" data-aos-delay="100">
                        <img src={{ asset("images/about/1.png") }} alt="images-not_found" />
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="offset-about">
                        <div class="about-content section-title primary">
                            <h5 class="sub-title">// Whay Choose Us?</h5>
                            <h3 class="title">We Are Trusted Digital Marketing Company.</h3>
                            <p>
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type scrambled.
                            </p>
                            <span class="hr-primary mt-4"></span>
                        </div>
                        <div class="about-object">
                            <div class="about-object-list">
                                <div class="icon">
                                    <img src={{ asset("images/icon/1.png") }}}} alt="images-not_found" />
                                </div>
                                <div class="about-object-content">
                                    <h4 class="title">High Customer Retention Rate</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing typesetting Ipsum has been the industry's standard dummy.
                                    </p>
                                </div>
                            </div>
                            <!-- about-object-list end -->
                            <div class="about-object-list">
                                <div class="icon">
                                    <img src={{ asset("images/icon/2.png") }}}} alt="images-not_found" />
                                </div>
                                <div class="about-object-content">
                                    <h4 class="title">Dedicated Customer Support</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing typesetting Ipsum has been the industry's standard dummy.
                                    </p>
                                </div>
                            </div>
                            <!-- about-object-list end -->
                            <div class="about-object-list">
                                <div class="icon">
                                    <img src={{ asset("images/icon/3.png") }} alt="images-not_found" />
                                </div>
                                <div class="about-object-content">
                                    <h4 class="title">Professional Team Member</h4>
                                    <p>
                                        Lorem Ipsum is simply dummy text of the printing typesetting Ipsum has been the industry's standard dummy.
                                    </p>
                                </div>
                            </div>
                            <!-- about-object-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- about section end -->

    <!-- case studies section start -->
    <div class="case-studies-section">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="section-title primary text-center pb-100">
                        <div class="icon">
                            <img src={{ asset("images/icon/webpack.png") }}}} alt="Icon_not_found" />
                        </div>
                        <h3 class="title">Some Case Studies</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="case-carousel">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <!-- single slide start -->
                                <div class="swiper-slide" data-aos="fade-up" data-aos-delay="900">
                                    <div class="case-card">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="case-shap case-shape1" src={{ asset("images/case/shape1.png") }}}} alt="images_not_found" />
                                                <img class="case-shape case-shape2" src={{ asset("images/case/shape2.png") }}}} alt="images_not_found" />

                                                <img class="case-image" src={{ asset("images/case/1.png") }} alt="images_not_found" /></a>
                                        </div>
                                        <div class="case-content">
                                            <h3 class="title">
                                                <a href="#">Marketing Automation</a>
                                            </h3>
                                            <p>Digital Strategy / Consulting</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide" data-aos="fade-up" data-aos-delay="600">
                                    <div class="case-card">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="case-shap case-shape1" src={{ asset("images/case/shape1.png") }}}} alt="images_not_found" />
                                                <img class="case-shape case-shape2" src={{ asset("images/case/shape2.png") }}}} alt="images_not_found" />

                                                <img class="case-image" src={{ asset("images/case/2.png") }} alt="images_not_found" /></a>
                                        </div>
                                        <div class="case-content">
                                            <h3 class="title">
                                                <a href="#">Marketing Automation</a>
                                            </h3>
                                            <p>Digital Strategy / Consulting</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                    <div class="case-card">
                                        <div class="thumb">
                                            <a href="#">
                                                <img class="case-shap case-shape1" src={{ asset("images/case/shape1.png") }}}} alt="images_not_found" />
                                                <img class="case-shape case-shape2" src={{ asset("images/case/shape2.png") }} alt="images_not_found" />

                                                <img class="case-image" src={{ asset("images/case/3.png") }}}} alt="images_not_found" /></a>
                                        </div>
                                        <div class="case-content">
                                            <h3 class="title">
                                                <a href="#">Marketing Automation</a>
                                            </h3>
                                            <p>Digital Strategy / Consulting</p>
                                        </div>
                                    </div>
                                </div>
                                <!-- single slide end -->
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="container case-carousel-navigation">
                                <div class="case-carousel swiper-button-prev">
                                    <i class="icofont-rounded-double-left"></i>
                                </div>
                                <div class="case-carousel swiper-button-next">
                                    <i class="icofont-rounded-double-right"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case studies section end -->

    <!-- team section start -->
    <section class="team-section position-relative">
        <img class="pattern" src={{ asset("images/team/pattern.png") }} alt="images-not_found" />
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="section-title process text-center pb-90">
                        <div class="icon">
                            <img src={{ asset("images/icon/team.png") }} alt="Icon_not_found" />
                        </div>
                        <h3 class="title">Amazing Team Members</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>

            <div class="row mb-n7">
                <div class="col-lg-3 col-sm-6 mb-7" data-aos="fade-up" data-aos-delay="300">
                    <div class="team-card">
                        <div class="thumb">
                            <img src={{ asset("images/team/1.png") }}}} alt="images_not_found" />
                            <img class="social-hover" src={{ asset("images/team/team-hover.png") }} alt="images_not_found" />
                            <ul class="team-social">
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3 class="title">Willie Mckenzie</h3>
                            <p>Digital Strategist</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-7" data-aos="fade-up" data-aos-delay="600">
                    <div class="team-card">
                        <div class="thumb">
                            <img src={{ asset("images/team/2.png") }} alt="images_not_found" />
                            <img class="social-hover" src={{ asset("images/team/team-hover.png") }}}} alt="images_not_found" />
                            <ul class="team-social">
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3 class="title">Rosie Greene</h3>
                            <p>Project Manager</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-7" data-aos="fade-up" data-aos-delay="900">
                    <div class="team-card">
                        <div class="thumb">
                            <img src={{ asset("images/team/3.png") }} alt="images_not_found" />
                            <img class="social-hover" src={{ asset("images/team/team-hover.png") }} alt="images_not_found" />
                            <ul class="team-social">
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3 class="title">Stacey Evans</h3>
                            <p>Ui/ux designer</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 mb-7" data-aos="fade-up" data-aos-delay="1200">
                    <div class="team-card">
                        <div class="thumb">
                            <img src={{ asset("images/team/4.png") }}}} alt="images_not_found" />
                            <img class="social-hover" src={{ asset("images/team/team-hover.png") }}}} alt="images_not_found" />
                            <ul class="team-social">
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-facebook"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-twitter"></i></a>
                                </li>
                                <li class="team-social-item">
                                    <a class="team-social-link" href="#"><i class="icofont-skype"></i></a>
                                </li>
                            </ul>
                        </div>
                        <div class="content">
                            <h3 class="title">Marian Adams</h3>
                            <p>seo specialist</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- team section end -->

    <!-- faq section start -->
    <section class="faq-section">
        <img src={{ asset("images/faq/bg.png") }} alt="images-not_found" class="faq-bg" />
        <div class="container">
            <div class="row mb-n7">
                <div class="col-xl-6 mb-7">
                    <div class="faq-image" data-aos="zoom-in" data-aos-delay="100">
                        <img src={{ asset("images/faq/1.png") }} alt="images_not_found" />
                    </div>
                </div>
                <div class="col-xl-6 mb-7">
                    <div class="faq-content">
                        <div class="section-title primary">
                            <h5 class="sub-title">// FAQ.</h5>
                            <h3 class="title">Frequiently Asked Question.</h3>
                            <span class="hr-primary mt-4"></span>
                        </div>
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>1. How can I start SEO Marketing?</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text the printing typesetting industry has been the industry's standard dummy text ever printer took galley of type scrambled.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span>2. How can I start SEO Marketing?</span>
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text the printing typesetting industry has been the industry's standard dummy text ever printer took galley of type scrambled.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <span>3. How can I start SEO Marketing?</span>
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text the printing typesetting industry has been the industry's standard dummy text ever printer took galley of type scrambled.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingFoure">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFoure" aria-expanded="false" aria-controls="collapseFoure">
                                        <span>4. How can I start SEO Marketing?</span>
                                    </button>
                                </h2>
                                <div id="collapseFoure" class="accordion-collapse collapse" aria-labelledby="headingFoure" data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <p>
                                            Lorem Ipsum is simply dummy text the printing typesetting industry has been the industry's standard dummy text ever printer took galley of type scrambled.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- faq team section end -->

    <!-- testimonial section start -->

    <section class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                    <div class="section-title primary text-center pb-100">
                        <div class="icon">
                            <img src={{ asset("images/icon/testimonial.png") }} alt="Icon_not_found" />
                        </div>
                        <h3 class="title">From Happy Customer</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>
            <div class="row position-relative">
                <div class="clients">
                    <img src={{ asset("images/testimonial/2.png") }} alt="images-not_found" class="client" />
                    <img src={{ asset("images/testimonial/3.png") }} alt="images-not_found" class="client" />
                    <img src={{ asset("images/testimonial/4.png") }} alt="images-not_found" class="client" />
                    <img src={{ asset("images/testimonial/5.png") }} alt="images-not_found" class="client" />
                    <img src={{ asset("images/testimonial/6.png") }} alt="images-not_found" class="client" />
                    <img src={{ asset("images/testimonial/7.png") }} alt="images-not_found" class="client" />
                </div>
                <div class="col-12 mx-auto">
                    <div class="testimonial-content position-relative">
                        <img class="shape" src={{ asset("images/testimonial/shape.png") }} alt="images-not_found" />
                        <div class="testimonial-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/1.png") }} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/lg-2.png") }} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/lg-3.png") }}}} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/lg-4.png") }} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/lg-5.png") }} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src={{ asset("images/testimonial/lg-6.png") }} alt="images-not_found" />
                                            <span class="quote">“</span>
                                        </div>

                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting as been the industry's standard dummy text ever since the 1500s when unknown printer took a galley of type and scrambled it to make specimen book has survived not only five centuries
                                        </p>
                                        <h5 class="sub-title">Georgia Jones</h5>
                                        <span class="designation">Ui/Ux designer</span>
                                    </div>
                                    <!-- swiper-slide end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- testimonial section end -->

    <!-- blog section start -->
    <section class="blog-section">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-lg-6 mb-7">
                    <div class="section-title text-center text-lg-start primary" data-aos="fade-up" data-aos-delay="100">
                        <h3 class="title">Latest News From Our Blog.</h3>
                        <span class="hr-primary mt-4"></span>
                    </div>

                    <div class="blog-card" data-aos="fade-up" data-aos-delay="600">
                        <div class="thumb">
                            <a href="#"><img src={{ asset("images/blog/1.png") }}}} alt="images-not_found" /></a>
                        </div>
                        <div class="content">
                            <p>
                                By Admin / 12 January, 2021 / <span>Digital Marketing.</span>
                            </p>
                            <h3 class="title">
                                <a href="#">The Step-by-Step Guide to Improving Your Google
                                    Rankings.</a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 mb-7">
                    <div class="blog-meta-cards">
                        <!-- blog-meta-card  -->
                        <div class="blog-meta-card" data-aos="fade-up" data-aos-delay="300">
                            <div class="thumb">
                                <img src={{ asset("images/blog/2.png") }} alt="images-not_found" />
                            </div>
                            <div class="content">
                                <p>
                                    By Admin / 12 January, 2021 /
                                    <span>Digital Marketing.</span>
                                </p>
                                <h3 class="title">
                                    <a href="#">
                                        The Step-by-Step Guide to improving your google rankings.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <!-- blog-meta-card  end-->
                        <!-- blog-meta-card  -->
                        <div class="blog-meta-card" data-aos="fade-up" data-aos-delay="1200">
                            <div class="thumb">
                                <img src={{ asset("images/blog/3.png") }} alt="images-not_found" />
                            </div>
                            <div class="content">
                                <p>
                                    By Admin / 12 January, 2021 /
                                    <span>Digital Marketing.</span>
                                </p>
                                <h3 class="title">
                                    <a href="#">
                                        The Step-by-Step Guide to improving your google rankings.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <!-- blog-meta-card  end-->
                        <!-- blog-meta-card  -->
                        <div class="blog-meta-card" data-aos="fade-up" data-aos-delay="1500">
                            <div class="thumb">
                                <img src={{ asset("images/blog/4.png") }} alt="images-not_found" />
                            </div>
                            <div class="content">
                                <p>
                                    By Admin / 12 January, 2021 /
                                    <span>Digital Marketing.</span>
                                </p>
                                <h3 class="title">
                                    <a href="#">
                                        The Step-by-Step Guide to improving your google rankings.
                                    </a>
                                </h3>
                            </div>
                        </div>
                        <!-- blog-meta-card  end-->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog section end -->

    <footer class="footer-section position-relative">
        <img class="footer-bg-shape" src={{ asset("images/footer/shape.png") }} alt="images_notFound" />
        <img class="path-shape" src={{ asset("images/footer/path-shape.png") }} alt="images_notFound" />

        <svg class="path-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 126.82 303.68">
            <defs>
                <radialGradient id="radial-gradient" cx="78.77" cy="6322.87" r="43.8" gradientTransform="translate(0 -3383.39) scale(1 0.58)" gradientUnits="userSpaceOnUse">
                    <stop offset="0.16" stop-color="#2647c8" />
                    <stop offset="0.17" stop-color="#294ac9" />
                    <stop offset="0.29" stop-color="#6179d7" />
                    <stop offset="0.42" stop-color="#92a2e3" />
                    <stop offset="0.54" stop-color="#b9c4ed" />
                    <stop offset="0.66" stop-color="#d8def5" />
                    <stop offset="0.78" stop-color="#edf0fb" />
                    <stop offset="0.9" stop-color="#fbfbfe" />
                    <stop offset="1" stop-color="#fff" />
                </radialGradient>
                <linearGradient id="linear-gradient" x1="45.02" y1="258.73" x2="112.52" y2="258.73" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#fff" />
                    <stop offset="0.27" stop-color="#f4f7fd" />
                    <stop offset="0.74" stop-color="#d8e0f8" />
                    <stop offset="1" stop-color="#c5d2f4" />
                </linearGradient>
                <linearGradient id="linear-gradient-2" x1="43.77" y1="240.52" x2="113.76" y2="240.52" gradientUnits="userSpaceOnUse">
                    <stop offset="0" stop-color="#c5d2f4" />
                    <stop offset="0.26" stop-color="#d8e0f8" />
                    <stop offset="0.73" stop-color="#f4f7fd" />
                    <stop offset="1" stop-color="#fff" />
                </linearGradient>
            </defs>
            <g class="cls-1">
                <path class="cls-2" d="M111.1,297c17.86-10.25,17.86-27,0-37.28s-47-10.25-64.74,0-17.75,27,0,37.28S93.25,307.24,111.1,297Z" transform="translate(0 -1)" />
                <path class="cls-3" d="M102.64,283.06c13.18-7.57,13.18-42.77,0-50.33s-34.69-7.57-47.79,0-13.11,42.76,0,50.33c6.47,3.74,15,7.3,23.57,7.35C87.18,290.45,96,286.89,102.64,283.06Z" transform="translate(0 -1)" />
                <path class="cls-4" d="M113.76,240.86c0-.23,0-.45,0-.68v-5.26h-1.35c-1.59-3.18-4.54-6.18-8.88-8.67-13.67-7.85-36-7.85-49.58,0-4.32,2.49-7.25,5.49-8.83,8.67H43.89v3.9a12.1,12.1,0,0,0,0,3.4v.09h0c.7,4.56,4,9,10.05,12.48,13.6,7.85,35.91,7.85,49.58,0,6-3.47,9.41-7.92,10.11-12.48h.12Z" transform="translate(0 -1)" />
                <path class="cls-5" d="M103.53,249.77c13.68-7.85,13.68-20.69,0-28.54s-36-7.85-49.58,0-13.6,20.69,0,28.54S89.86,257.63,103.53,249.77Z" transform="translate(0 -1)" />
                <path class="cls-6" d="M101.52,248.61c12.56-7.21,12.56-19,0-26.22s-33.06-7.21-45.55,0-12.49,19,0,26.22S89,255.83,101.52,248.61Z" transform="translate(0 -1)" />
                <path class="cls-7" d="M97.39,249.6c10.28-5.91,10.28-15.57,0-21.47s-27.06-5.9-37.28,0-10.23,15.56,0,21.47S87.11,255.5,97.39,249.6Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M80.79,242.55c.16-14.78.32-17.18.48-32,.07-7,.28-11.46-.21-18.41a95.41,95.41,0,0,0-3.73-19.67c-3.91-13.64-7.15-27.08-8.31-41.27a266.63,266.63,0,0,1,.2-41.63C70.4,73.74,72.55,58,74.74,42.19c.22-1.56-2.16-2.23-2.38-.66-3.85,27.69-7.7,55.65-6.22,83.68a180.79,180.79,0,0,0,6.69,40.73c1.91,6.63,4,13.22,5.09,20.05,1.07,7,1,11.67.94,18.75-.17,16.73-.36,21.08-.54,37.81a1.24,1.24,0,0,0,2.47,0Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M68.94,135.59c-5.26-5.31-10.58-10.8-14.13-17.44a28.67,28.67,0,0,1-3.46-11c-.39-4.37.39-8.74.88-13.07A37.33,37.33,0,0,0,47.76,71.3c-4.17-7.87-9.13-15.38-13.95-22.86-.86-1.33-3-.1-2.14,1.25,4.9,7.59,10,15.23,14.16,23.25A35.23,35.23,0,0,1,50,85.53c.43,4.37-.33,8.74-.84,13.07-.89,7.68,0,14.67,3.84,21.47,3.65,6.52,8.93,12,14.15,17.27,1.12,1.14,2.87-.61,1.75-1.75Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M72.51,153.29C74,142.2,86.55,136.48,93.38,129a52.06,52.06,0,0,0,13.21-31.12c.11-1.59-2.36-1.58-2.48,0a49.23,49.23,0,0,1-15.79,32.68c-7.2,6.58-16.9,12.23-18.28,22.78-.21,1.58,2.27,1.56,2.47,0Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M40.5,34.88c-1.13-7-7.14-12.12-12.74-16.53C19.15,11.57,10.33,4.67,0,1A77.52,77.52,0,0,1,8.61,22.43c1.24,5.25,2.11,11,5.84,14.88,5.2,5.42,15,6.31,17.55,13.39l5.43,7.74C36.41,50.53,41.76,42.76,40.5,34.88Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M85.33,14.47c-4,9.36-17.15,12.58-20.31,22.27-3.26,10,6.11,20.72,3.46,30.91L71,68.94c7.28-6.46,11.55-15.8,13.43-25.35S86,24.19,85.33,14.47Z" transform="translate(0 -1)" />
                <path class="cls-8" d="M126.82,52.12C118.59,57.29,112.24,64.9,106,72.38c-1.71,2.05-3.46,4.18-4.19,6.75a19.37,19.37,0,0,0-.38,6.27l1.11,23.2.69,3c3.68-5.89,13.56-6.08,16.07-12.56.91-2.33.56-4.93.33-7.42A75.29,75.29,0,0,1,126.82,52.12Z" transform="translate(0 -1)" />
            </g>

        </svg>

        <!-- <img class="shape" src="images/footer/1.png" alt="images_notFound" /> -->
        <div class="footer-top position-relative">
            <div class="container">
                <!-- Newsletter start -->
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="section-title process text-center pb-100">
                            <div class="icon">
                                <img src={{ asset("images/icon/launcher.png") }} alt="Icon_not_found" />
                            </div>
                            <h3 class="title">Subscribe To Our Newsletter</h3>
                            <span class="hr-secodary"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="300">
                        <div class="news-letter pb-100">
                            <form id="mc-form" action="#" class="news-letter-form position-relative">
                                <input id="mc-email" class="form-control" type="text" required="" placeholder="Enter Your Email Address" />
                                <button class="btn btn-warning">
                                    Subscribe Now <i class="icofont-rounded-double-right"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Newsletter end -->
                <div class="row">
                    <div class="col-12" data-aos="fade-up" data-aos-delay="600">
                        <div class="footer-card">
                            <div class="footer-row">
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <a class="footer-logo" href="index.html">
                                            <img src={{ asset("images/logo/upview.png") }} alt="logo_not_found" />
                                        </a>

                                        <ul class="adress">
                                            <li>
                                                <span class="icon"><i class="icofont-ui-call"></i></span>
                                                <a href="tel:0123456789">(+88) 454 632 897</a>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="icofont-send-mail"></i></span>
                                                <a href="mailto:demo@gmail.com">demo@gmail.com</a>
                                            </li>
                                            <li>
                                                <span class="icon"><i class="icofont-google-map"></i></span> Chilton, Texas(TX), 76632
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <h4 class="title">All Services</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Social Marketing
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>SEO Optimization
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Content Marketing
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Social Marketing
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Web Analytics
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <h4 class="title">Information</h4>
                                        <ul class="footer-menu">
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Vision & Values
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Winning Awards
                                                </a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Leadership</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Sustainability</a>
                                            </li>
                                            <li>
                                                <a class="footer-link" href="#">
                                                    <i class="icofont-rounded-double-right"></i>Careers</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="footer-col">
                                    <div class="footer-widget">
                                        <h4 class="title">Follow Us</h4>
                                        <p>
                                            Lorem Ipsum is simply dummy text the printing and typesetting.
                                        </p>
                                        <ul class="footer-social">
                                            <li class="footer-social-item">
                                                <a class="footer-social-link" href="#"><i class="icofont-facebook"></i></a>
                                            </li>
                                            <li class="footer-social-item">
                                                <a class="footer-social-link" href="#"><i class="icofont-twitter"></i></a>
                                            </li>
                                            <li class="footer-social-item">
                                                <a class="footer-social-link" href="#"><i class="icofont-skype"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coppy right satrt -->
        <div class="copy-right-section">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p>
                            Copyright &copy;
                            <!-- <span id="currentYear"></span> Made With -->
                            <span id="currentYear">
                                </span>
                            <!-- <i class="icofont-heart"></i> By -->
                            Powered By <a href="javascript:void();">Upview.ai</a> All Rights Reserved
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- coppy right end -->
    </footer>


    <!-- Scripts -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->

    <!-- <script src="js/vendor/vendor.min.js"></script>
<script src="js/plugins/plugins.min.js"></script>
<script src="js/ajax-contact.js"></script>
<script src="js/plugins/aos.js"></script>
<script src="js/plugins/waypoints.js"></script>
<script src="js/plugins/jquery.selectric.min.js"></script>
<script src="js/main.js"></script> -->

    <!-- Use the minified version files listed below for better performance and remove the files listed above -->

    <!-- #  Minified  js  -->

    <!-- vendor,plugins and main js -->

    <script src={{ asset("js/vendor/vendor.min.js") }}></script>
    <script src={{ asset("js/plugins/plugins.min.js") }}}}></script>
    <script src={{ asset("js/ajax-contact.js") }}></script>
    <script src={{ asset("js/plugins/aos.js") }}></script>
    <script src={{ asset("js/plugins/waypoints.js") }}></script>
    <script src={{ asset("js/plugins/jquery.selectric.min.js") }}></script>
    <script src={{ asset("js/main.min.js") }}></script>

</body>

</html>

</html>
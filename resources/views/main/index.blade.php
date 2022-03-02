<x-main-layout>
    <section class="hero-section">
        <img class="shape shape1" src="{{ asset('main/images/hero/shape1.png') }}" alt="img_not_found" />
        <img class="shape shape2" src="{{ asset('main/images/hero/shape2.png') }}" alt="img_not_found" />
        <img class="shape particle1" src="{{ asset('main/images/hero/particle1.png') }}" alt="img_not_found" />
        <img class="shape particle2" src="{{ asset('main/images/hero/particle2.png') }}" alt="img_not_found" />
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-xl-6">
                    <div class="hero-content">
                        <h2 class="title">A Powerful tool for social media management.</h2>
                        <p>
                            <span class="hr d-none d-xl-block"></span>Easy way to manage socail media and get powerful Analytics.
                        </p>
                        <img class="particle3" src="{{ asset('main/images/hero/particle3.png') }}" alt="particle2" />
                    </div>
                </div>
                <div class="col-lg-7 col-xl-6">
                    <div class="hero-img">
                        <img class="animate-one" src="{{ asset('main/images/hero/1.png') }}" alt="img_not_found" data-aos="zoom-in" data-aos-delay="100" />
                        <div class="position-absolute animate-two">
                            <img data-aos="fade-up" data-aos-delay="600" src="{{ asset('main/images/hero/2.png') }}" alt="img_not_found" />
                        </div>

                        <div class="position-absolute animate-three">
                            <img data-aos="fade-down" data-aos-delay="400" src="{{ asset('main/images/hero/3.png') }}" alt="img_not_found" />
                        </div>
                    </div>

                    <div class="hero-img-mobile">
                        <img src="{{ asset('main/images/hero/mobile.png') }}" alt="images-not_found" />
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
                                    <a class="brand-before" href="#"><img src="{{ asset('main/images/brand-logo/1.png') }}" alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src="{{ asset('main/images/brand-logo/1.1.png') }}" alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src="{{ asset('main/images/brand-logo/2.png') }}" alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src="{{ asset('main/images/brand-logo/2.1.png') }}" alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src="{{ asset('main/images/brand-logo/3.png') }}" alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src="{{ asset('main/images/brand-logo/3.1.png') }}" alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src="{{ asset('main/images/brand-logo/4.png') }}" alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src="{{ asset('main/images/brand-logo/4.1.png') }}" alt="images-not_found" /></a>
                                </div>
                                <!-- single slide end -->
                                <!-- single slide start -->
                                <div class="swiper-slide">
                                    <a class="brand-before" href="#"><img src="{{ asset('main/images/brand-logo/5.png') }}" alt="images-not_found" /></a>
                                    <a class="brand-after" href="#"><img src="{{ asset('main/images/brand-logo/5.1.png') }}" alt="images-not_found" /></a>
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
                            <img src="{{ asset('main/images/icon/sharing.png') }}" alt="Icon_not_found" />
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
                        <img class="line" src="{{ asset('main/images/service/line-one.png') }}" alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around dagnger">
                                <span></span>
                            </div>
                            <img src="{{ asset('main/images/icon/marketing.png') }}" alt="" />
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
                        <img class="line" src="{{ asset('main/images/service/line-two.png') }}" alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around warning">
                                <span></span>
                            </div>
                            <img src="{{ asset('main/images/icon/analytics.png') }}" alt="" />
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
                        <img class="line" src="{{ asset('main/images/service/line-three.png') }}" alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around primary">
                                <span></span>
                            </div>
                            <img src="{{ asset('main/images/icon/connect.png') }}" alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">Social Media Management</h4>
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
                        <img class="line" src="{{ asset('main/images/service/line-foure.png') }}" alt="images_not_found" />
                        <div class="service-icon">
                            <div class="roted-around secondary">
                                <span></span>
                            </div>
                            <img src="{{ asset('main/images/icon/document.png') }}" alt="" />
                        </div>
                        <div class="service-content">
                            <h4 class="title">Social Listening</h4>
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
                        <a href="service-details.html" class="btn btn-warning">All Services <em class="icofont-rounded-double-right"></em></a>
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
                            <img src="{{ asset('main/images/icon/pencile.png') }}" alt="Icon_not_found" />
                        </div>
                        <h3 class="title">Working Process</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>

            <div class="row working-process mb-n4">
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="400">
                    <img class="arrow-shape" src="{{ asset('main/images/working/arrow-shape1.png') }}" alt="images_not_found" />
                    <div class="icon">
                        <img src="{{ asset('main/images/working/1.png') }}" alt="images_not_found" />
                    </div>
                    <h4 class="title">Idea Generation</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="500">
                    <img class="arrow-shape" src="{{ asset('main/images/working/arrow-shape2.png') }}" alt="images_not_found" />
                    <div class="icon">
                        <img src="{{ asset('main/images/working/2.png') }}" alt="images_not_found" />
                    </div>
                    <h4 class="title">Working Plan</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="600">
                    <img class="arrow-shape" src="{{ asset('main/images/working/arrow-shape1.png') }}" alt="images_not_found" />
                    <div class="icon">
                        <img src="{{ asset('main/images/working/3.png') }}" alt="images_not_found" />
                    </div>
                    <h4 class="title">SEO Research</h4>
                </div>
                <!-- working-process-list end -->
                <!-- working-process-list start -->
                <div class="col-lg-3 col-sm-6 working-process-list mb-4" data-aos="fade-up" data-aos-delay="700">
                    <div class="icon">
                        <img src="{{ asset('main/images/working/4.png') }}" alt="images_not_found" />
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
        <img src="{{ asset('main/images/about/bg.png') }}" alt="images-not_found" class="about-bg" />
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="about-img-content" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset('main/images/about/1.png') }}" alt="images-not_found" />
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
                                    <img src="{{ asset('main/images/icon/1.png') }}" alt="images-not_found" />
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
                                    <img src="{{ asset('main/images/icon/2.png') }}" alt="images-not_found" />
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
                                    <img src="{{ asset('main/images/icon/3.png') }}" alt="images-not_found" />
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
                            <img src="{{ asset('main/images/icon/webpack.png') }}" alt="Icon_not_found" />
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
                                                <img class="case-shap case-shape1" src="{{ asset('main/images/case/shape1.png') }}" alt="images_not_found" />
                                                <img class="case-shape case-shape2" src="{{ asset('main/images/case/shape2.png') }}" alt="images_not_found" />

                                                <img class="case-image" src="{{ asset('main/images/case/1.png') }}" alt="images_not_found" /></a>
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
                                                <img class="case-shap case-shape1" src="{{ asset('main/images/case/shape1.png') }}" alt="images_not_found" />
                                                <img class="case-shape case-shape2" src="{{ asset('main/images/case/shape2.png') }}" alt="images_not_found" />

                                                <img class="case-image" src="{{ asset('main/images/case/2.png') }}" alt="images_not_found" /></a>
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
                                                <img class="case-shap case-shape1" src="{{ asset('main/images/case/shape1.png') }}" alt="images_not_found" />
                                                <img class="case-shape case-shape2" src="{{ asset('main/images/case/shape2.png') }}" alt="images_not_found" />

                                                <img class="case-image" src="{{ asset('main/images/case/3.png') }}" alt="images_not_found" /></a>
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
                                    <em class="icofont-rounded-double-left"></em>
                                </div>
                                <div class="case-carousel swiper-button-next">
                                    <em class="icofont-rounded-double-right"></em>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- case studies section end -->

    <!-- faq section start -->
    <section class="faq-section">
        <img src="{{ asset('main/images/faq/bg.png') }}" alt="images-not_found" class="faq-bg" />
        <div class="container">
            <div class="row mb-n7">
                <div class="col-xl-6 mb-7">
                    <div class="faq-image" data-aos="zoom-in" data-aos-delay="100">
                        <img src="{{ asset('main/images/faq/1.png') }}" alt="images_not_found" />
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
                            <img src="{{ asset('main/images/icon/testimonial.png') }}" alt="Icon_not_found" />
                        </div>
                        <h3 class="title">From Happy Customer</h3>
                        <span class="hr-secodary"></span>
                    </div>
                </div>
            </div>
            <div class="row position-relative">
                <div class="clients">
                    <img src="{{ asset('main/images/testimonial/2.png') }}" alt="images-not_found" class="client" />
                    <img src="{{ asset('main/images/testimonial/3.png') }}" alt="images-not_found" class="client" />
                    <img src="{{ asset('main/images/testimonial/4.png') }}" alt="images-not_found" class="client" />
                    <img src="{{ asset('main/images/testimonial/5.png') }}" alt="images-not_found" class="client" />
                    <img src="{{ asset('main/images/testimonial/6.png') }}" alt="images-not_found" class="client" />
                    <img src="{{ asset('main/images/testimonial/7.png') }}" alt="images-not_found" class="client" />
                </div>
                <div class="col-12 mx-auto">
                    <div class="testimonial-content position-relative">
                        <img class="shape" src="{{ asset('main/images/testimonial/shape.png') }}" alt="images-not_found" />
                        <div class="testimonial-carousel">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <!-- swiper-slide start -->
                                    <div class="swiper-slide" data-aos="fade-up" data-aos-delay="300">
                                        <div class="profile-wrap">
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/1.png') }}" alt="images-not_found" />
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
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/lg-2.png') }}" alt="images-not_found" />
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
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/lg-3.png') }}" alt="images-not_found" />
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
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/lg-4.png') }}" alt="images-not_found" />
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
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/lg-5.png') }}" alt="images-not_found" />
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
                                            <img class="testimonial-profile" src="{{ asset('main/images/testimonial/lg-6.png') }}" alt="images-not_found" />
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
                            <a href="#"><img src="{{ asset('main/images/blog/1.png') }}" alt="images-not_found" /></a>
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
                                <img src="{{ asset('main/images/blog/2.png') }}" alt="images-not_found" />
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
                                <img src="{{ asset('main/images/blog/3.png') }}" alt="images-not_found" />
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
                                <img src="{{ asset('main/images/blog/4.png') }}" alt="images-not_found" />
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

</x-main-layout>
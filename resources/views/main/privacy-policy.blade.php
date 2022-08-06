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
                                                <h1 class="title">Upview.in Privacy Policy</h1>
                                                <h4>Last updated: Jan 01, 2022</h4>
                                                <p>
                                                    Upview.in respects your right to privacy. This privacy
                                                    policy (“Privacy Policy”) explains who we are, how we
                                                    collect, share and use information about you and how you can
                                                    exercise your privacy rights. Our Privacy Policy applies to
                                                    all users of Upview Social
                                                    websites and services, including but not limited to
                                                    www.upview.in (depending on your use, the “Site” and/or the
                                                    “Service”). For further information on the terms which
                                                    govern your use of the respective Service, please see
                                                    <a href="https://upview.in/privacy-policy">https://upview.in/privacy-policy</a> or any service order you
                                                    may have signed with us.

                                                </p>
                                                <h4 class="title">1. What does Upview.in do? </h4>
                                                <p>
                                                    If you have any questions or concerns about our use of your
                                                    information, then please contact us using the contact
                                                    details provided in the “How to Contact Us” section of this
                                                    Privacy Policy. Upview.in is a Mumbai headquartered provider
                                                    of software for
                                                    social media management, social advocacy, social analytics,
                                                    and social listening. For more information about Upview.in,
                                                    please see the “About Us” section of our Site at
                                                    <a href="https://upview.in/about">https://upview.in/about</a>

                                                </p>
                                                <h4 class="title">2. Information Collected </h4>
                                                <p>
                                                    We collect information about visitors to our Site, our
                                                    customers and their users of the Service, job applicants,
                                                    and users of our customers’ social media pages / properties.
                                                    Such information is collected from the following sources:
                                                    Information We Collect
                                                    Directly from You: The type of information that we collect
                                                    directly from you varies based on your interaction with our
                                                    Site and our Service. For example, we collect information
                                                    directly from you when you register an account
                                                    with us, liaise with us on a customer service issue, apply
                                                    for a job, and complete an application or other forms on the
                                                    Site and/or Service. We also collect information that you
                                                    send us via any medium, including, but not
                                                    limited to email address and phone number. In addition, we
                                                    collect information about you from your social media
                                                    interactions on third party social media properties, such as
                                                    your social media handle, username, profile, postings,
                                                    and messages you exchange with our customers. Information We
                                                    Receive from Customers: We receive information from
                                                    customers in order to provide our Service. Such information
                                                    may include a user’s social media handle, username,
                                                    profile picture, biography, follower counts, website URL,
                                                    first and last name (if provided by user), and messages or
                                                    communications with our customers. We collect information
                                                    from individuals employed by our customers such
                                                    as their contact information in order to provide our
                                                    Service.


                                                </p>
                                                <h4 class="title">3. Information Collected Automatically </h4>
                                                <p>
                                                    When you visit our Site or use our Service, we may collect
                                                    certain information automatically from your device. In some
                                                    countries, including countries in the European Economic
                                                    Area, this information may be considered personal
                                                    information under applicable
                                                    data protection laws. Specifically, the information we
                                                    collect automatically may include information like your IP
                                                    address, device type, unique device identification numbers,
                                                    browser-type, broad geographic location (e.g.
                                                    country or city-level location), third party webpages
                                                    accessed via the Service and other technical information. We
                                                    may also collect information about how your device has
                                                    interacted with our Site (including the pages accessed
                                                    and links clicked) or Service (including content accessed).
                                                    Collecting this information enables us to better understand
                                                    the visitors who come to our Site or use our Service, where
                                                    they come from, and what content and functionality
                                                    is of interest to them. We use this information for our
                                                    internal analytics purposes and to improve the quality and
                                                    relevance of our Site and/or Service to our visitors and
                                                    users. Some of this information may be collected
                                                    using cookies and similar tracking technology, as explained
                                                    further under the heading “Cookies, similar tracking
                                                    technology, and analytics” below and in our Cookie Notice.
                                                </p>

                                                <h4 class="title">4. Information from Other Sources </h4>
                                                <p>
                                                    We also collect information from other sources. The
                                                    following are the categories of sources we collect
                                                    information from: Data brokers or resellers from which we
                                                    purchase data to verify and supplement the data we collect.
                                                    Social networks when you engage
                                                    with our content, reference our Site or Service, or grant us
                                                    permission to access information from the social networks.
                                                    Partners that offer co-branded services, sell or distribute
                                                    our products, or engage in joint marketing
                                                    activities. Customers that provide us with information which
                                                    we process as a service provider.
                                                </p>

                                                <h4 class="title">5. Do-Not-Track </h4>
                                                <p>
                                                    Your browser settings may allow you to automatically
                                                    transmit a “Do Not Track” signal to online services you
                                                    visit. Note, however, there is no industry consensus as to
                                                    what site and app operators should do with regard to these
                                                    signals. Accordingly, unless
                                                    and until the law is interpreted to require us to do so, our
                                                    systems do not recognize browser “do-not-track” requests.
                                                    You may, however, disable certain tracking as discussed in
                                                    this Privacy Policy (e.g., by disabling cookies,
                                                    or using ‘private’ browsing modes).
                                                </p>
                                                <h4 class="title">6. Use of Information </h4>
                                                <p>
                                                    Upview.in processes information for business and commercial
                                                    purposes in accordance with the practices described in this
                                                    Privacy Policy. Our business purposes for collecting and
                                                    using information, including in the last 12 months, include
                                                    the following:
                                                    Operate and improve the Site and Service; Provide users or
                                                    customers with the Service and other products and services
                                                    that a user or customer may request or that a user or
                                                    customer has expressed interest in; Facilitate
                                                    subscription processing, reviews and analysis; Evaluate user
                                                    interest and needs in order to improve the Service and make
                                                    available other offers, products or services; Record calls
                                                    with customers for quality, training and
                                                    Service improvement purposes (upon receipt of consent where
                                                    required by applicable law); Evaluate the types of offers,
                                                    products or services we make available to users or customers
                                                    and potential users or customers; Monitor
                                                    use of the Service, including for t1bleshooting and product
                                                    improvement purposes; Provide customer support; Communicate
                                                    and provide additional information that may be of interest
                                                    to users through email or other means,
                                                    such as special offers, announcements, and marketing
                                                    materials; Conduct online research surveys regarding the
                                                    Site and/or Service; Combine datasets to create aggregated
                                                    data for internal evaluation and analysis; Share anonymised
                                                    or personalized tokens across the Upview.in in order to
                                                    provide the Service; Send you reminders, technical notices,
                                                    updates, product announcements, security alerts and support
                                                    and administrative messages, service bulletins,
                                                    or marketing; Provide advertisements to you through email
                                                    messages; As necessary to consider your job application for
                                                    open positions, process your employment and education
                                                    history, transcript, writing samples, and references;
                                                    Manage our everyday business needs such as Site and/or
                                                    Service administration, forum management, fulfillment,
                                                    analytics, fraud prevention, enforcement of our corporate
                                                    reporting obligations, legal terms and any other contractual
                                                    agreement relating to our Service or to comply with the law;
                                                    and fulfil any other business or commercial purposes at your
                                                    direction or with your notice and/or consent.
                                                    Notwithstanding the above, we may use information that
                                                    does not identify you (including information that has been
                                                    aggregated or de-identified) for any purpose except as
                                                    prohibited by applicable law. For information on your rights
                                                    and choices regarding how we use information
                                                    about you, please see “Your Data Protection Rights” below.

                                                </p>
                                                <h4 class="title">7. To Whom We May Share Your Information </h4>
                                                <p>
                                                    We share information we collect in accordance with the
                                                    practices described in this Privacy Policy. The following
                                                    are the categories of recipients: To our affiliates, service
                                                    providers and partners who provide data processing services
                                                    to us (for example,
                                                    to support the delivery of, provide functionality on, or
                                                    help to enhance the security of our Site or Service), or who
                                                    otherwise process information for purposes that are
                                                    described in this Privacy Policy or for which we
                                                    provide you notice when we collect your information. We
                                                    share information with our affiliates for business and
                                                    commercial purposes. We contractually prohibit our service
                                                    providers from retaining, using, or disclosing information
                                                    about you for any purpose other than performing the services
                                                    for us, although we may permit them to use information that
                                                    does not identify you (including information that has been
                                                    aggregated or de-identified) for any purpose
                                                    except as prohibited by applicable law. To our customers in
                                                    connection with us processing information on their behalf to
                                                    provide social media management, social advocacy, social
                                                    analytics, and social listening services.
                                                    For example, we share information with our customers in
                                                    order to facilitate your orders, maintain and administer
                                                    your online accounts, respond to your questions and
                                                    comments, comply with your requests, market and advertise
                                                    to you and otherwise comply with applicable law; To
                                                    resellers, in certain countries and only where permitted by
                                                    applicable law. We may provide contact information of
                                                    customers / potential customers to such reseller to market
                                                    our Service. To any competent law enforcement body,
                                                    regulatory, government agency, court or other third party
                                                    where we believe disclosure is necessary (i) as a matter of
                                                    applicable law or court order or regulation, (ii)
                                                    to exercise, establish or defend our legal rights, or (iii)
                                                    to protect your vital interests or those of any other
                                                    person; To a potential buyer (and its agents, investors,
                                                    and/or advisors) in connection with any proposed
                                                    or actual purchase, merger or acquisition of any part of our
                                                    business, provided that we inform the buyer it must use your
                                                    information only for the purposes disclosed in this Privacy
                                                    Policy; To vendors for business and commercial
                                                    purposes, including analytics and advertising technology
                                                    companies. Vendors may act as our service providers, or in
                                                    certain contexts, independently decide how to process your
                                                    information. For more information on advertising
                                                    and analytics, see the “Cookies, similar tracking
                                                    technology, and analytics” section below; To any other
                                                    person with notice to you and your consent to the
                                                    disclosure; when you voluntarily enter a sweepstakes,
                                                    contest, or
                                                    other promotion, we share information as set out in the
                                                    official rules that govern the promotion as well as for
                                                    administrative purposes and as required by law (e.g., on a
                                                    winners list). By entering a promotion, you agree
                                                    to the official rules that govern that promotion, and may,
                                                    except where prohibited by applicable law, allow the sponsor
                                                    and/or other entities to use your name, voice and/or
                                                    likeness in advertising or marketing materials;
                                                    when you make information public through the Site or
                                                    Service, such as information in your profile or that you
                                                    post or comment on public boards, including through Discuss
                                                    and social media, your information is publicly viewable.
                                                    Please think carefully before making information public as
                                                    you are solely responsible for any information you make
                                                    public. Once you have posted information, you may not be
                                                    able to edit or delete such information, subject
                                                    to additional rights set out in the “Your Data Protection
                                                    Rights” section below; and when you request or direct us to
                                                    share information, such as when you choose to share
                                                    information with a social network or other third
                                                    party platform about your activities on the Service, which
                                                    may require you to accept such third party’s terms of use or
                                                    privacy policy. Please note the Service uses YouTube API
                                                    Services as a service provider, and if you
                                                    use these services through the Service, you are subject to
                                                    the Google Privacy Policy, located at
                                                    <a href="https://policies.google.com/privacy">https://policies.google.com/privacy</a>. Notwithstanding the
                                                    above, we may share information that does not identify you
                                                    (including
                                                    information that has been aggregated or de-identified)
                                                    except as prohibited by applicable law. For information on
                                                    your rights and choices regarding how we share information
                                                    about you, please see the “Your Data Protection
                                                    Rights” section below. In certain situations, we may be
                                                    required to disclose personal data in response to lawful
                                                    requests by public authorities, including to meet national
                                                    security or law enforcement requirements.

                                                </p>
                                                <h4 class="title">8.Legal basis for processing personal data
                                                    (EEA or UK visitors / users only) </h4>
                                                <p>
                                                    If you are a visitor or user from the European Economic Area
                                                    or the UK, our legal basis for collecting and using the
                                                    personal data described above will depend on the personal
                                                    data concerned and the specific context in which we collect
                                                    it. However, we
                                                    will normally collect personal data from you only where we
                                                    have your consent to do so, where we need the personal data
                                                    to perform a contract with you, or where the processing is
                                                    in our legitimate interests and not overridden
                                                    by your data protection interests or fundamental rights and
                                                    freedoms. In some cases, we may also have a legal obligation
                                                    to collect personal data from you. If we ask you to provide
                                                    personal data to comply with a legal requirement
                                                    or to perform a contract with you, we will make this clear
                                                    at the relevant time and advise you whether the provision of
                                                    your personal data is mandatory or not (as well as of the
                                                    possible consequences if you do not provide
                                                    your personal data). Similarly, if we collect and use your
                                                    personal data in reliance of our legitimate interests (or
                                                    those of any third party), we will make clear to you at the
                                                    relevant time what those legitimate interests
                                                    are. If you have questions about or need further information
                                                    concerning the legal basis on which we collect and use your
                                                    personal data, please contact us using the contact details
                                                    provided under the “How to Contact Us”
                                                    heading below.

                                                </p>

                                                <h4 class="title">9. Cookies, similar tracking technology, and
                                                    analytics </h4>
                                                <p>
                                                    We use cookies and similar tracking technology
                                                    (collectively, “Cookies”) to collect and use information
                                                    about you, including to serve interest-based advertising.
                                                    For further information about the types of Cookies we use,
                                                    why, and how you can control Cookies,
                                                    please see our Cookie Policy. We also use analytics
                                                    services, such as Google Analytics, to help us understand
                                                    how users access and use the Service. In addition, we also
                                                    use audience matching services to reach people (or
                                                    people similar to people) who have visited our Service or
                                                    are identified in one or more of our databases (“Matched
                                                    Ads”). This is done by us uploading a customer list to a
                                                    technology service or incorporating a pixel from
                                                    a technology service into our own Service, and the
                                                    technology service matching common factors between our data
                                                    and their data. For instance, we incorporate the Facebook
                                                    pixel on our Service and may share your email address
                                                    with Facebook as part of our use of Facebook Custom
                                                    Audiences. Google provides tools to allow you to opt out of
                                                    the use of certain information collected by Google Analytics
                                                    at <a href="https://tools.google.com/dlpage/gaoptout">https://tools.google.com/dlpage/gaoptout</a> and
                                                    by Google Analytics for Display Advertising or the Google
                                                    Display Network at
                                                    <a href="https://www.google.com/settings/ads/onweb/">https://www.google.com/settings/ads/onweb/</a>. To opt out of us
                                                    using your data for Matched Ads, please contact us as set
                                                    forth in the “Contact Us”
                                                    section below and specify that you wish to opt out of
                                                    matched ads. We will request that the applicable technology
                                                    service not serve you matched ads based on information we
                                                    provide to it. Alternatively, you may directly
                                                    contact the applicable technology service to opt out. As
                                                    indicated above, vendors may act as our service providers,
                                                    or in certain contexts, independently decide how to process
                                                    your information. We encourage you to familiarize
                                                    yourself with and consult their privacy policies and terms
                                                    of use.

                                                </p>

                                                <h4 class="title">10. Social Media and Technology Integrations
                                                </h4>
                                                <p>
                                                    We offer parts of our Service through websites, platforms,
                                                    and services operated or controlled by separate entities, In
                                                    addition, we integrate technologies operated or controlled
                                                    by separate entities into parts of our Site and Service.
                                                    Some examples include:
                                                    Links. Our Site and Service includes links that hyperlink to
                                                    websites, platforms, and other services not operated or
                                                    controlled by us. Liking, Sharing, and Logging-In. We may
                                                    embed a pixel or SDK on our Site or Service
                                                    that allows you to “like” or “share” content on, or log-in
                                                    to your account through social media. If you choose to
                                                    engage with such integration, we may receive information
                                                    from the social network that you have authorized
                                                    to share with us. Please note that the social network may
                                                    independently collect information about you through the
                                                    integration. Brand Pages and Chatbots. We may offer our
                                                    content through social media. Any information you
                                                    provide to us when you engage with our content (such as
                                                    through our brand page or via our chatbot on the Site or
                                                    Service) is treated in accordance with this Privacy Policy.
                                                    Also, if you publicly reference our Service on
                                                    social media (e.g., by using a hashtag associated with
                                                    Upview Social in a tweet or post), we may use your reference
                                                    on or in connection with our Site or Service. Please note
                                                    that when you interact with other entities, including
                                                    when you leave our Site or Service, those entities may
                                                    independently collect information about you and solicit
                                                    information from you. The information collected and stored
                                                    by those entities remains subject to their own policies,
                                                    terms, and practices, including what information they share
                                                    with us, your rights and choices on their services and
                                                    devices, and whether they store information in the U.S. or
                                                    elsewhere. We encourage you to familiarize yourself
                                                    with and consult their privacy policies and terms of use.

                                                </p>

                                                <h4 class="title">11. Your Data Protection Rights </h4>
                                                <p>
                                                    You have the following data protection rights: If you wish
                                                    to access, correct, update or request deletion of your
                                                    information, you can do so at any time by contacting us
                                                    using the contact details provided under the “How to Contact
                                                    Us” heading below. Note
                                                    that if you submit a request to delete your information,
                                                    this may prohibit you from using the Site and/or Service. If
                                                    you have authorized us to access your data via the YouTube
                                                    API Services, then in addition to our normal
                                                    procedure for deleting stored data, you may revoke our
                                                    access to your data via the Google security settings page,
                                                    located at
                                                    <a href="https://security.google.com/settings/security/permissions">https://security.google.com/settings/security/permissions</a>.
                                                    In addition, if you are a resident
                                                    of the European Union, you can object to processing of your
                                                    personal data, ask us to restrict processing of your
                                                    personal data, or request portability of your personal data.
                                                    Again, you can exercise these rights by contacting
                                                    us using the contact details provided under the “How to
                                                    Contact Us” heading below. Note that if you submit such a
                                                    request, this may prohibit you from using the Site and/or
                                                    Service. You have the right to opt-out of marketing
                                                    communications we send you at any time. You can exercise
                                                    this right by clicking on the “unsubscribe” or “opt-out”
                                                    link in the marketing emails we send you. To opt-out of
                                                    other forms of marketing (such as postal marketing
                                                    or telemarketing), then please contact us using the contact
                                                    details provided under the “How to Contact Us” heading
                                                    below. Please note that your opt out is limited to the email
                                                    address, device, and phone number used and
                                                    will not affect subsequent subscriptions. Similarly, if we
                                                    have collected and processed your information with your
                                                    consent, then you can withdraw your consent at any time.
                                                    Withdrawing your consent will not affect the lawfulness
                                                    of any processing we conducted prior to your withdrawal, nor
                                                    will it affect processing of your information conducted in
                                                    reliance on lawful processing grounds other than consent.
                                                    You have the right to complain to a data
                                                    protection authority about our collection and use of your
                                                    information. For more information, please contact your local
                                                    data protection authority. We respond to all requests we
                                                    receive from individuals wishing to exercise
                                                    their data protection rights in accordance with applicable
                                                    data protection laws. Where we process your information
                                                    solely on behalf of a customer, we may be legally required
                                                    to forward your request directly to our customer
                                                    and/or social media business partners for their review /
                                                    handling. California residents may have additional rights as
                                                    set out in Section 23 (“Additional Disclosures for
                                                    California Residents”) below.

                                                </p>

                                                <h4 class="title">12. Security & User ID/Password </h4>
                                                <p>
                                                    Our Site and/or Service implements and maintains various
                                                    reasonable and appropriate administrative, physical, and
                                                    technical security safeguards to help protect information
                                                    about you from loss, theft, misuse and unauthorized access,
                                                    disclosure, alteration
                                                    and destruction. These security safeguards include, but are
                                                    not limited to, network and host security controls (e.g.,
                                                    firewalls, intrusion detection systems, etc.), data
                                                    encryption (both at rest and during transmission),
                                                    and operating procedures that are designed to protect your
                                                    information. You should protect your user ID and password
                                                    and NOT share it with anyone. Additionally, enabling
                                                    two-step verification or SSO integration, where available,
                                                    is also recommended. If you believe your user ID and
                                                    password have been compromised or you have trouble changing
                                                    your user ID/password on the Site or Service, please contact
                                                    our technical support department (support@upview.in).
                                                    Nevertheless, transmission via the internet is not
                                                    completely secure and we cannot guarantee the security of
                                                    information about you.
                                                </p>

                                                <h4 class="title">13. Data retention </h4>
                                                <p>
                                                    We retain information we collect from you where we have an
                                                    ongoing legitimate business need to do so (for example, to
                                                    provide you with a service you have requested or to comply
                                                    with applicable legal, tax or accounting requirements). When
                                                    we have no ongoing
                                                    legitimate business need to process your information, we
                                                    will either delete or anonymise it in accordance with our
                                                    data retention policy, or, in the limited circumstances
                                                    where this is not possible (for example, because
                                                    your information has been stored in backup archives), then
                                                    we will securely store your information and isolate it from
                                                    any further processing until deletion is possible.

                                                </p>

                                                <h4 class="title">14. CAN-SPAM Compliance Notice (U.S. users
                                                    only) </h4>
                                                <p>
                                                    We may send periodic promotional or informational emails to
                                                    you. You may opt-out of promotional communications by
                                                    following the unsubscribe or opt-out instructions contained
                                                    in the email. Please note that it may take up to 10 business
                                                    days for us to process
                                                    opt-out requests. If you opt-out of receiving promotional
                                                    emails about recommendations or other information we think
                                                    may interest you, we may still send you emails about your
                                                    account or any Service you have requested or
                                                    received from us.
                                                </p>

                                                <h4 class="title">15. International Transfers </h4>
                                                <p>
                                                    our information may be transferred to, and processed in,
                                                    countries other than the country in which you are resident.
                                                    These countries may have data protection laws that are
                                                    different to the laws of your country. Specifically, our
                                                    servers are located in
                                                    India, and our group companies and third party service
                                                    providers and partners operate around the world. This means
                                                    that when we collect your information we may process it in
                                                    any of these countries. However, we have taken
                                                    appropriate safeguards to ensure that your information will
                                                    remain protected in accordance with this Privacy Policy.
                                                    These include our use of European Commission-approved
                                                    Standard Contractual Clauses or using or disclosing
                                                    personal information transferred from the European Union and
                                                    our continued commitment to honouring principles set forth
                                                    in the EU – U.S. Privacy Shield Framework, additional
                                                    details of which are set out below.

                                                </p>

                                                <h4 class="title">16. Transfers Outside of the EEA and
                                                    Switzerland </h4>
                                                <p>
                                                    Upview.in has certified that it adheres to the principles of
                                                    the EU-U.S. Privacy Shield Framework and the Swiss-U.S.
                                                    Privacy Shield Framework (“Privacy Shield Principles”) as
                                                    set forth by the U.S. Department of Commerce regarding the
                                                    collection, use,
                                                    and retention of personal data from the European Economic
                                                    Area and Switzerland transferred to the United States. While
                                                    Upview.in does not rely on the Privacy Shield Principles as
                                                    the legal basis for the transfer of personal
                                                    information from the EEA, United Kingdom, or Switzerland,
                                                    Upview Social is committed to protecting personal data from
                                                    the EEA, United Kingdom, and Switzerland in compliance with
                                                    those principles. If there is any conflict
                                                    between the policies in this Privacy Policy and data subject
                                                    rights under the Privacy Shield Principles, the Privacy
                                                    Shield Principles shall govern. To learn more about the
                                                    Privacy Shield program, and to view our certification
                                                    page, please visit <a href="https://www.privacyshield.gov/">https://www.privacyshield.gov/</a>. With
                                                    respect to personal data received or transferred pursuant to
                                                    the Privacy Shield Frameworks, Upview Social is subject to
                                                    the investigatory and enforcement authority
                                                    of the U.S. Federal Trade Commission.

                                                </p>

                                                <h4 class="title">17. Contacting Us, Complaints and Dispute
                                                    Resolution </h4>
                                                <p>
                                                    In compliance with the Privacy Shield Principles, Upview.in
                                                    commits to resolve complaints about your privacy and our
                                                    collection or use of your information transferred to the
                                                    United States pursuant to Privacy Shield. European Union and
                                                    Swiss individuals
                                                    with privacy inquiries or complaints should first contact us
                                                    by email at privacy@upview.in. We will work to resolve your
                                                    issue and will respond within 45 days of receipt. If,
                                                    however, you believe that we have not been able
                                                    to assist with your complaint or concern, and you are
                                                    located in the EEA, the United Kingdom, or Switzerland, you
                                                    have the right to lodge a complaint with the competent
                                                    supervisory authority. Upview.in has further committed
                                                    to refer unresolved privacy complaints under the Privacy
                                                    Shield Principles to an independent dispute resolution
                                                    mechanism, the BBB EU Privacy Shield, operated by the
                                                    Council of Better Business Bureaus. If you do not receive
                                                    timely acknowledgment of your complaint, or if your
                                                    complaint is not satisfactorily addressed, please visit
                                                    www.bbb.org/EU-privacy-shield/for-eu- consumers for more
                                                    information and to file a complaint. This service is
                                                    provided
                                                    free of charge to you. If your Privacy Shield complaint
                                                    cannot be resolved through the above channels, under certain
                                                    conditions, you may invoke binding arbitration for some
                                                    residual claims not resolved by other redress
                                                    mechanisms. See Privacy Shield Annex 1 at
                                                    <a href="https://www.privacyshield.gov/article?id=ANNEX-I-introduction">https://www.privacyshield.gov/article?id=ANNEX-I-introduction</a>.
                                                    Upview.in commits to cooperate with EU data protection
                                                    authorities and comply with advice given by such authorities
                                                    with respect to human resources data transferred from the
                                                    European Union in the context of any employment relationship
                                                    with a European Union individual.

                                                </p>

                                                <h4 class="title">18. Privacy Complaints in Brazil </h4>
                                                <p>
                                                    In circumstances in which Brazil law is controlling, we
                                                    commit to resolve complaints about your privacy and our
                                                    collection or use of your information. We have further
                                                    committed to refer unresolved privacy complaints to an
                                                    independent dispute resolution
                                                    mechanism.
                                                </p>


                                                <h4 class="title">19. Children </h4>
                                                <p>
                                                    This Service is intended for a general audience, and is not
                                                    directed at children under thirteen (13) years of age.
                                                    Consistent with the federal Children’s Online Privacy
                                                    Protection Act of 1998 (COPPA), we do not knowingly request
                                                    personal information from
                                                    anyone under the age of 13 without requiring parental
                                                    consent. Any person who provides their personal information
                                                    to us through our Site or Service represents that they are
                                                    at least 13 years of age. If you are a parent
                                                    or guardian and you believe we have collected information
                                                    from your child in a manner not permitted by law, contact us
                                                    at privacy@upview.in. We will remove the data to the extent
                                                    required by applicable laws. We do not knowingly
                                                    “sell,” as that term is defined under the CCPA, the personal
                                                    information of minors under 16 years old who are California
                                                    residents. If you are a California resident under 18 years
                                                    old and registered to use the Service,
                                                    you can ask us to remove any content or information you have
                                                    posted on the Service. To make a request, email us at the
                                                    email address set out in the “How to Contact Us” section
                                                    with “California Under 18 Content Removal Request”
                                                    in the subject line, and tell us what you want removed. We
                                                    will make reasonable good faith efforts to remove the post
                                                    from prospective public view, although we cannot ensure the
                                                    complete or comprehensive removal of the
                                                    content and may retain the content as necessary to comply
                                                    with our legal obligations, resolve disputes, and enforce
                                                    our agreements.

                                                </p>


                                                <h4 class="title">20. Your Nevada Privacy Rights </h4>
                                                <p>
                                                    Nevada law (SB 220), permits customers in Nevada to opt-out
                                                    of the sale of certain kinds of personal information. A sale
                                                    under Nevada law is the transfer of this personal
                                                    information to third parties for monetary consideration.
                                                    Upview.in does not sell
                                                    your personal information to third parties as defined in
                                                    Nevada law. If you are a Nevada resident and wish to obtain
                                                    information about our compliance with Nevada law, please
                                                    contact us as at privacy@upview.in.
                                                </p>


                                                <h4 class="title">21. Updates to this Privacy Policy </h4>
                                                <p>
                                                    We may update this Privacy Policy from time to time in
                                                    response to changing legal, technical or business
                                                    developments. When we update our Privacy Policy, we will
                                                    take appropriate measures to inform you, consistent with the
                                                    significance of the changes
                                                    we make. We will obtain your consent to any material Privacy
                                                    Policy changes if and where this is required by applicable
                                                    data protection laws. You can see when this Privacy Policy
                                                    was last updated by checking the “last updated”
                                                    date displayed at the top of this Privacy Policy.

                                                </p>

                                                <h4 class="title">22. How to Contact Us </h4>
                                                <p>
                                                    If you have any questions about this Privacy Policy or our
                                                    privacy practices, please contact us at developers@upview.in
                                                    If you have a disability and would like to access this
                                                    Privacy Policy in an alternative format, please contact us
                                                    at developers@upview.in.
                                                    If you have a privacy concern or complaint, please contact
                                                    our Data Protection Officer at developers@upview.in. When
                                                    you contact us, please indicate in which country and/or
                                                    state you reside.

                                                </p>



                                                <h4 class="title">23. Additional Disclosures for California
                                                    Residents </h4>
                                                <p>
                                                    These additional disclosures for California residents apply
                                                    only to individuals who reside in California. The California
                                                    Consumer Privacy Act of 2018 (“CCPA”) provides additional
                                                    rights to know, delete and opt out, and requires businesses
                                                    collecting or
                                                    disclosing personal information to provide notices and means
                                                    to exercise rights.
                                                </p>



                                                <h4 class="title">24. Notice of Collection. </h4>
                                                <p>
                                                    In the 12 months prior to the last update of this Privacy
                                                    Policy, we have collected the following categories of
                                                    personal information enumerated in the CCPA: Identifiers,
                                                    including name, email address, phone number account name, IP
                                                    address, and an ID or
                                                    number assigned to your account. Customer records, billing
                                                    and shipping address, and credit or debit card information.
                                                    Commercial information, including purchases and engagement
                                                    with the Service. Internet activity, including
                                                    your interactions with our Service. Audio or visual data,
                                                    including pictures or videos you post on our Service.
                                                    Employment and education data, including information you
                                                    provide when you apply for a job with us. Inferences,
                                                    including information about your interests, preferences and
                                                    favorites. For more information on information we collect,
                                                    including the sources we receive information from, review
                                                    the Information Collected and Information
                                                    Collected Automatically sections. We collect and use these
                                                    categories of personal information for the business purposes
                                                    described in the Use of Information section, including to
                                                    provide and manage our Service. Upview.in
                                                    does not generally sell information as the term “sell” is
                                                    traditionally understood. However, to the extent “sale”
                                                    under the CCPA is interpreted to include advertising
                                                    technology activities such as those disclosed in the
                                                    Cookies, similar tracking technology, and analytics section
                                                    as a “sale,” we will comply with applicable law as to such
                                                    activity. Upview.in discloses the following categories of
                                                    personal information for commercial purposes:
                                                    identifiers, demographic information, commercial
                                                    information, internet activity, geolocation data and
                                                    inferences. We may disclose each of the foregoing categories
                                                    of personal information for the business and commercial
                                                    purposes described in this Privacy Policy to the extent
                                                    permitted by applicable law to the categories of third
                                                    parties as described in this Privacy Policy, which may
                                                    include our service providers and suppliers; our business
                                                    and marketing partners, including advertising networks, data
                                                    analytics providers, data brokers, and social networks; and
                                                    other parties in connection with business transfers and for
                                                    legal, safety, fraud prevention, and enforcement
                                                    reasons. We use and partner with different types of entities
                                                    to assist with our daily operations and manage our Service.
                                                    We may share your personal information with government
                                                    entities when required to do so by law. Please
                                                    review the To Whom We Share Your Information section for
                                                    more detail about the parties we have shared information
                                                    with.

                                                </p>



                                                <h4 class="title">25. Right to Know and Delete. </h4>
                                                <p>
                                                    Consumers who are California residents (and not
                                                    representatives of businesses, whether those businesses are
                                                    our customers or others) have the right to request that we
                                                    delete the personal information we have collected from you
                                                    (subject to certain exemptions) and the right to know
                                                    certain information about our data practices in the
                                                    preceding 12 months. In particular, you have the right to
                                                    request the following from us: The categories of personal
                                                    information we have collected about you; The categories of
                                                    sources from which the personal information was collected;
                                                    The categories of personal information about you we
                                                    disclosed for a business purpose or sold; The categories of
                                                    third parties to whom
                                                    the personal information was disclosed for a business
                                                    purpose or sold; The business or commercial purpose for
                                                    collecting or selling the personal information; and The
                                                    specific pieces of personal information we have collected
                                                    about you. To exercise any of these rights, please email us
                                                    at developers@upview.in, submit a request through our online
                                                    form available on our Help Centre. In the request, please
                                                    specify which right you are seeking to exercise
                                                    and the scope of the request. We will confirm receipt of
                                                    your request within 10 days. We may require additional
                                                    information from you to help us verify your identity and
                                                    process your request. The verification steps may vary
                                                    depending on the sensitivity of the personal information and
                                                    whether you have an account with us. If we are unable to
                                                    verify your identity, we may deny your requests to know or
                                                    delete. We may deny certain requests, or fulfil
                                                    a request only in part, based on our legal rights and
                                                    obligations. For example, we may retain personal information
                                                    as permitted by law, such as for tax or other record keeping
                                                    purposes, to maintain an active account, and
                                                    to process transactions and facilitate your requests. Except
                                                    as otherwise provided by applicable California law, for
                                                    purposes of these requests under this Section, personal
                                                    information does not include information about
                                                    job applicants, employees and other of our personnel;
                                                    information about employees and other representatives of
                                                    third-party entities we may interact with; or information we
                                                    have collected as a service provider to our customers.
                                                    If personal information about you has been processed by us
                                                    as a service provider on behalf of a customer and you wish
                                                    to exercise any rights you have with such personal
                                                    information, please inquire with our customer directly.
                                                    If you wish to make your request directly to us, please
                                                    provide the name of our customer on whose behalf we
                                                    processed your personal information. We will refer your
                                                    request to that customer, and will support them to the
                                                    extent required by applicable law in responding to your
                                                    request.

                                                </p>

                                                <h4 class="title">26. YouTube API Client Terms of Use & Privacy
                                                    Policy </h4>
                                                <p>
                                                    We Use YouTube APIs to fetch the data linked with your
                                                    authorized account. Users who authorize access are bound by
                                                    the YouTube Terms Of Service.Please refer <a href="https://www.youtube.com/t/terms">YouTube ToS </a>
                                                    for more information.
                                                </p>

                                                <h4 class="title">27. Right to Opt-Out. </h4>
                                                <p>
                                                    To the extent Upview.in sells your personal information as
                                                    the term “sell” is defined under the California Consumer
                                                    Privacy Act, you have the right to opt-out of the sale of
                                                    your personal information by us to third parties at any
                                                    time. You may submit a request to opt-out by clicking Do Not
                                                    Sell My Personal Information. You may also submit a request
                                                    to opt-out by emailing us at developers@upview.in.
                                                </p>


                                                <h4 class="title">28. Authorized Agent. </h4>
                                                <p>
                                                    You can designate an authorized agent to submit requests on
                                                    your behalf. However, we will require written proof of the
                                                    agent’s permission to do so and verify your identity
                                                    directly.
                                                </p>


                                                <h4 class="title">29. Right to Non-Discrimination. </h4>
                                                <p>
                                                    You have the right not to receive discriminatory treatment
                                                    by us for the exercise of any of your rights.
                                                </p>


                                                <h4 class="title">30.Shine the Light. </h4>
                                                <p>
                                                    Pursuant to Section 1798.83 of the California Civil Code,
                                                    residents of California can obtain certain information about
                                                    the types of personal information that companies with whom
                                                    they have an established business relationship have shared
                                                    with third parties
                                                    for direct marketing purposes during the preceding calendar
                                                    year. In particular, the law provides that companies must
                                                    inform consumers about the categories of personal
                                                    information that have been shared with third parties,
                                                    the names and addresses of those third parties, and examples
                                                    of the types of services or products marketed by those third
                                                    parties. To request a copy of the information disclosure
                                                    provided by Upview.in pursuant to Section
                                                    1798.83 of the California Civil Code, please contact us via
                                                    email at developers@upview.in.
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
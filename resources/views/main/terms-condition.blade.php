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
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,600;0,700;0,800;1,300;1,400;1,600;1,700;1,800&display=swap" rel="stylesheet">

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
                            <a href="{{ route('main.index') }}" class="img-responsive"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" title=""></a>
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
                    <div class="nav-logo"><a href="{{ route('main.index') }}"><img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="150px" height="50px" alt="" title=""></a></div>
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
                                <h2>Terms & Conditions</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--End breadcrumb area-->


        <!--Start Terms & Conditions Area-->
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
                                                <h1 class="title">Upview.in Terms & Condition</h1>
                                                <h4>Last updated: Jan 01, 2022</h4>

                                                <ol start="1" type="1">
                                                    <li>
                                                        <h4>ACCEPTANCE OF OUR TERMS</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            These Terms of Service (“<strong>Terms</strong>”) constitute a
                                                            binding contract between you and Neomobile Advertising LLP.
                                                            governing the use of and access to the products we offer in
                                                            connection with a paid or trial subscription (“ <strong>Products</strong>”) to you and any authorized individuals
                                                            engaged by you to use the Products on your behalf (each, a “ <strong>User</strong>,” and collectively, “<strong>Users</strong>
                                                            ”). By using or accessing the Products, or authorizing or
                                                            permitting any User to use or access the Products, you accept and
                                                            agree to be bound by these Terms.
                                                        </li>
                                                        <li>
                                                            If you are entering into these Terms on behalf of a company,
                                                            organization, or other legal entity (“<strong>Entity</strong>”),
                                                            you agree to these Terms for that Entity and represent to Neomobile
                                                            Advertising LLP that you have the authority to bind such Entity and
                                                            its affiliates to these Terms. In such case, “you” or “Customer”
                                                            shall refer to such Entity and its affiliates. If you are a
                                                            Customer’s User, then these Terms will apply to you to the extent
                                                            they are applicable to Users. If Customer is an agency, then a User
                                                            may also be an agency client as described in Section 10 (Agencies).
                                                            If you do not have the authority to bind the Entity to these Terms
                                                            or do not agree to these Terms, do not accept these Terms or use or
                                                            access the Products.
                                                        </li>
                                                        <li>
                                                            You represent and warrant that the information you provide in
                                                            registering for the Products is accurate, complete, and rightfully
                                                            yours to use.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>REGISTERING USERS ON OUR APPLICATION</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            Except as set forth in Section 10 (Agencies), you agree that you
                                                            will only access our Applications for your internal business
                                                            purposes and subject to these Terms. After any free trial of our
                                                            Products, you will be required to register for our Application and
                                                            pay a subscription fee for the use of our Products. You must pay
                                                            such subscription fees on the first day of your subscription term
                                                            unless otherwise specified on your service order.
                                                        </li>
                                                        <li>
                                                            If you, as a Customer, add Users to your account, you must bind
                                                            each of the Users to these Terms. You are responsible for all
                                                            information, data, content, messages or other materials that you or
                                                            your Users post or otherwise transmit via the Applications
                                                            (collectively, “<strong>Content</strong>”). You acknowledge and
                                                            agree that a login may only be used by one (1) person, and that you
                                                            will not share a single login among multiple people. You are
                                                            responsible for maintaining the confidentiality of your login and
                                                            account, and are fully responsible for any and all activities that
                                                            occur under or in connection with your login or account. Except as
                                                            provided in Section 10 (Agencies), you agree that you will not
                                                            trade, transfer, or sell access to your login or account to another
                                                            party unless otherwise agreed to in writing by Neomobile
                                                            Advertising LLP.
                                                        </li>
                                                        <li>
                                                            As a User, you represent and warrant that you are: (i) 18 years old
                                                            or older, (ii) not prohibited or restricted from having a Neomobile
                                                            Advertising LLP account, and (iii) not a competitor of or using the
                                                            Products for purposes that are competitive with Neomobile
                                                            Advertising LLP.
                                                        </li>
                                                        <li>
                                                            You agree to use reasonable efforts to prevent unauthorized use of
                                                            the Products and notify us immediately if you discover any
                                                            unauthorized use through your account. You will take all necessary
                                                            steps to terminate the unauthorized use and agree to cooperate with
                                                            us in preventing or terminating such unauthorized use of the
                                                            Products. Our Products support log-ins through two-factor
                                                            authentication. You acknowledge that Neomobile Advertising LLP will
                                                            not be responsible for any damages, losses, or liability that would
                                                            have been prevented by the implementation of such two-factor
                                                            authentication by you or your Users.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>AVAILABILITY OF SERVICE</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            While we will use commercially reasonable efforts to keep our
                                                            Applications available and accessible, the Applications may be
                                                            unavailable from time to time for repairs, upgrades, routine and
                                                            emergency maintenance, or other interruptions that may be out of
                                                            our reasonable control, including any outages of Third-Party
                                                            Services (as defined in Section 5) or any related application
                                                            programming interface (“<strong>APIs</strong>”) and integrations.
                                                            Interruptions of our Applications shall not serve as a basis to
                                                            terminate your subscription or demand any full or partial refunds
                                                            or credits of prepaid and unused subscription fees.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>OUR USE OF THIRD PARTY INTEGRATIONS AND SERVICES</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            Our Applications may contain links to or allow you to connect and
                                                            use certain external third-party products, services, or software in
                                                            conjunction with your use of our Applications and Products (“<strong>Third Party Services</strong>,” and each, a “ <strong>Third Party Service</strong>”), including certain social
                                                            media networks and other integration partners. To take advantage of
                                                            these features, you may be required to sign up or log into such
                                                            Third Party Service on their respective websites or applications.
                                                            By enabling the Applications to access such Third Party Service,
                                                            you are permitting Neomobile Advertising LLP to pass on your login
                                                            information to the Third Party Service and granting the Third Party
                                                            Service permission to access or otherwise process your data. You
                                                            acknowledge that your use of such Third Party Service is governed
                                                            solely by the terms and conditions, acceptable use policy, privacy
                                                            policy or any other similar policy or terms of such Third Party
                                                            Service (including, but not limited to, the Twitter Terms of
                                                            Service located at
                                                            <a href="https://twitter.com/en/tos">
                                                                <strong>www.twitter.com/tos</strong>
                                                            </a>
                                                            and the YouTube Terms of Service located at
                                                            <a href="https://www.youtube.com/t/terms">
                                                                <strong>https://www.youtube.com/t/terms</strong>
                                                            </a>
                                                            ) (collectively, “<strong>Third Party Service Terms</strong>”), and
                                                            that Neomobile Advertising LLP does not endorse, is not liable for,
                                                            and makes no representations as to the Third Party Service, its
                                                            content, or the manner in which such Third Party Service uses,
                                                            stores, or processes your data. We are not liable for any damage or
                                                            loss arising from or in connection with your enablement of such
                                                            Third Party Service and your reliance on the policies, privacy
                                                            practices, and data security processes of such Third Party Service.
                                                            We are not responsible or liable for any changes to or deletion of
                                                            your data by the Third Party Service. Certain features of our
                                                            Products may depend on the availability of these Third Party
                                                            Services and the features and functionality they make available to
                                                            us. We do not control Third Party Service features and
                                                            functionality, and they may change without any notice to us. If any
                                                            Third Party Service stops providing access to some or all of the
                                                            features or functionality currently or historically available to
                                                            us, or stops providing access to such features and functionality on
                                                            reasonable terms, as determined by Neomobile Advertising LLP in our
                                                            sole discretion, we may stop providing access to certain features
                                                            and functionality of our Products. We will not be liable to you for
                                                            any refunds or any damage or loss arising from or in connection
                                                            with any such change made by the Third Party Service or any
                                                            resulting change to our Products. You irrevocably waive any claim
                                                            against Neomobile Advertising LLP with respect to such Third Party
                                                            Services.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>PAYMENT TERMS</h4>
                                                    </li>
                                                </ol>
                                                <p>
                                                    You will either pay for your Plan in our Application, or upon receipt of an
                                                    invoice issued by us.
                                                </p>
                                                <ol start="6" type="1">
                                                    <ol start="0" type="1">
                                                        <li>
                                                            <h4>Payment in Application</h4>
                                                        </li>
                                                    </ol>
                                                </ol>
                                                <p>
                                                    <h4>Monthly Plans</h4>
                                                    For monthly Plans, we will charge you on the first day of your
                                                    subscription term and automatically on the same date of each subsequent
                                                    month (“<strong>Monthly Pay Date</strong>”). We will continue to charge you
                                                    for your Plan, including any Add-Ons, on a monthly basis unless you decide
                                                    to cancel at any time by accessing the “Billing” page within the
                                                    Application. If you cancel in the month preceding your Monthly Pay Date,
                                                    you will not be issued any refunds or credits of prepaid and unused fees
                                                    for the remainder of the subscription term and you will continue to have
                                                    access to the Products until the following Monthly Pay Date.
                                                </p>
                                                <p>
                                                    <h4>Annual Plans</h4>
                                                    For annual Plans, we will charge you on the first day of your
                                                    subscription term and automatically on the same date of each subsequent
                                                    year (“<strong>Annual Pay Date</strong>”). We will continue to charge you
                                                    for your Plan, including any Add-Ons, on an annual basis unless you decide
                                                    to cancel prior to the Annual Pay Date by accessing the “Billing” page
                                                    within the Application. If you cancel during the subscription term, you
                                                    will not be issued any refunds or credits of any prepaid and unused fees
                                                    for the remainder of the subscription term and you will continue to have
                                                    access to the Products until the following Annual Pay Date. Neomobile
                                                    Advertising LLP reserves the right to increase subscription fees for your
                                                    annual Plan on your Annual Pay Date; provided, however, that such increase
                                                    shall not exceed 7% over the fees related to the immediately preceding
                                                    subscription term.
                                                </p>
                                                <p>
                                                    <h4>Annual Plans with monthly payment</h4>
                                                    For annual Plans that pay on a monthly basis, we will charge you on the
                                                    first day of your subscription term and automatically on the same date of
                                                    each subsequent month of your subscription term. We will continue to charge
                                                    you for your Plan, including any Add-Ons, on a monthly basis throughout the
                                                    duration of your subscription term and any subsequent renewal terms, unless
                                                    you decide to cancel at least thirty days prior to the end of your current
                                                    subscription term by notifying your account manager or info@upview.in. If
                                                    you cancel during the subscription term, you will not be issued any refunds
                                                    for or credits of any prepaid and unused fees for the remainder of the
                                                    subscription term, you will be required to pay any and all unpaid fees
                                                    related to the subscription term, and you will continue to have access to
                                                    the Products until the end of the subscription term. Neomobile Advertising
                                                    LLP reserves the right to increase subscription fees for your Plan upon the
                                                    first day of your renewal subscription term; provided, however, that such
                                                    increase shall not exceed 7% over the fees related to the immediately
                                                    preceding subscription term.
                                                </p>
                                                <ol start="6" type="1">
                                                    <ol start="1" type="1">
                                                        <li>
                                                            <h4>Payment By Invoice</h4>
                                                            If we invoice you for your Plan, your subscription term will be
                                                            detailed on the service order and your payment will be due upon
                                                            receipt of the applicable invoice. Unless otherwise specified on
                                                            your service order, if we do not receive payment within thirty (30)
                                                            days of us issuing you the invoice, your account may be suspended
                                                            and you will lose access to the Products. Unless otherwise
                                                            specified on your service order, your Plan will automatically renew
                                                            at the end of the subscription term. If you would like to cancel
                                                            your Plan, you must provide such notice via email to info@upview.in
                                                            at least thirty (30) days prior to the end of the subscription
                                                            term. Neomobile Advertising LLP reserves the right to increase
                                                            subscription fees upon renewal; provided, however, that such
                                                            increase shall not exceed 7% over the fees related to the
                                                            immediately preceding subscription term.
                                                        </li>
                                                        <li>
                                                            <h4>Changes To Your Plan</h4>
                                                            If you choose to upgrade your Plan or add any Add-Ons to your
                                                            Plan during your subscription term, you will be charged for the
                                                            then-current price for the upgrade or Add-Ons prorated based on the
                                                            number of days remaining in your subscription term. Unless
                                                            otherwise specified on your service order, any upgrade or Add-Ons
                                                            that you add will be coterminous with the existing Plan and
                                                            automatically renew at the end of the subscription term along with
                                                            your Plan. If you choose to downgrade your Plan or remove any
                                                            Add-Ons from your Plan, you will not be issued any refunds or
                                                            credits for the unused and prepaid fees in connection with the
                                                            downgrade or removal. Downgrading your Plan may cause the loss of
                                                            content, features, or capacity of your account and we do not accept
                                                            any liability for any such loss.
                                                        </li>
                                                        <li>
                                                            <strong>Credit Card and Paypal Authorization</strong>
                                                            By submitting your credit card or Paypal information to Neomobile
                                                            Advertising LLP, you authorize Neomobile Advertising LLP to store
                                                            this information with its third party service providers and to
                                                            charge the credit card or Paypal account you have provided to us
                                                            until your account is terminated. In addition, you authorize us to
                                                            use a third-party payment processor in processing payments. If your
                                                            credit card expires, or is declined or your Paypal information
                                                            requires an update, we will provide you notice via email. If, for
                                                            any reason, your payment cannot be completed through credit card or
                                                            Paypal, we may suspend your account until we receive payment.
                                                        </li>
                                                        <li>
                                                            <h4>Disputes and Late Payments</h4>
                                                            You must notify us in writing of any amounts you wish to dispute
                                                            prior to the date such amounts would otherwise be due. Any
                                                            undisputed amount not paid when due shall be subject to a finance
                                                            charge of 1.5% of the unpaid balance per month or the highest rate
                                                            permitted by applicable law, whichever is less, determined and
                                                            compounded daily from the date due until the date paid. You will
                                                            also be required to reimburse us for any costs or expenses
                                                            (including any reasonable attorneys’ fees) we incur to collect past
                                                            due amounts. Any amounts due under these Terms shall not be
                                                            withheld or offset by you against amounts due to you for any
                                                            reason.
                                                        </li>
                                                        <li>
                                                            <h4>Taxes</h4>
                                                            All payments you make are exclusive of federal, state, local, and
                                                            foreign taxes, duties, tariffs, levies, withholdings, and similar
                                                            assessments (including, without limitation, sales taxes, use taxes,
                                                            and value-added taxes). You agree to be responsible for the payment
                                                            of all such charges, excluding taxes based upon our net income. All
                                                            amounts payable by you hereunder shall be grossed up for any
                                                            withholding taxes imposed by any foreign government on your payment
                                                            of amounts to Neomobile Advertising LLP.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>CANCELLATION AND TERMINATION</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            <h4>Termination by You</h4>
                                                            . You may terminate your account at any time without cause, but you
                                                            will not be entitled to any refunds of any prepaid and unused fees,
                                                            and any unpaid fees under your Plan for the applicable subscription
                                                            term will become immediately due and payable. You may terminate
                                                            your account and receive a prorated refund of any prepaid and
                                                            unused fees, if we fail to cure a material breach of these Terms
                                                            within thirty (30) days of our receipt of written notice from you
                                                            describing the breach. You may also cancel your account as provided
                                                            in Section 6 (Payment).
                                                        </li>
                                                        <li>
                                                            <h4>Termination by Us</h4>
                                                            . We may restrict functionality of the Products or temporarily
                                                            suspend your account if we reasonably believe that you have
                                                            violated these Terms. Unless we believe the need to restrict or
                                                            suspend access is time-sensitive and requires immediate action
                                                            without notice, or we are prohibited from providing notice under
                                                            law or legal order, we will use commercially reasonable efforts to
                                                            notify you by email prior to such suspension. We will not be liable
                                                            to you or any third parties for any of the foregoing actions. We
                                                            may terminate your account and use of the Products for any of the
                                                            following reasons: (i) you fail to comply with these Terms, (ii)
                                                            you do not pay your fees in accordance with the payment terms under
                                                            your Plan, (iii) at the expiration of the subscription period of
                                                            your Plan if we provide prior written notice to you, (iv) you
                                                            become the subject of a petition in bankruptcy or any other
                                                            proceeding relating to insolvency, receivership, liquidation or
                                                            assignment for the benefit of creditors, or (v) if we reasonably
                                                            determine you are acting or have acted in a way that could present
                                                            substantial reputational harm to Neomobile Advertising LLP or our
                                                            current or prospective partners or customers. In no event will any
                                                            termination by us for the foregoing reasons entitle you to any
                                                            refunds of any prepaid and unused fees or relieve you of your
                                                            obligation to pay any fees payable to us prior to the date of
                                                            termination, and any unpaid fees under your Plan will become
                                                            immediately due and payable. Any suspected fraudulent, abusive,
                                                            hateful, discriminatory or illegal activity may be grounds for
                                                            immediate termination of your use of the Product and may be
                                                            referred to law enforcement authorities.
                                                        </li>
                                                        <li>
                                                            <h4>Post Termination</h4>
                                                            . If your account is terminated, you must cease using the Products
                                                            and Neomobile Advertising LLP reserves the right to delete your
                                                            account settings and Content within thirty (30) days of such
                                                            cancellation or termination with no liability or notice to you.
                                                            Once your account settings and Content are deleted, you will not be
                                                            able to recover such account settings and Content, except any
                                                            Content that remains on Third Party Services pursuant to the terms
                                                            and conditions of such Third-Party Services.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>YOUR USE OF THE PRODUCTS</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            You agree not to, nor authorize or permit any User or third party
                                                            to: (a) license, sublicense, sell, rent, lease, or otherwise permit
                                                            third parties to use the Products; (b) circumvent or disable any
                                                            security or other technological features or measures of the
                                                            Products; (c) reverse engineer any element of the Products, or use
                                                            the Products to compete with the Products, (d) modify, adapt or
                                                            present the Products to falsely imply any sponsorship or
                                                            association with Neomobile Advertising LLP; (e) use the Products in
                                                            any manner that interferes with or disrupts the integrity or
                                                            performance of the Products or the components of the Products; (f)
                                                            use the Products to post, upload, link to, send or store any
                                                            Content that is defamatory, libelous, fraudulent, derogatory,
                                                            abusive, obscene, unlawful, hateful, harassing, violent,
                                                            threatening, racist, or discriminatory, (g) use the Products to
                                                            post, upload, link to, send, distribute, or store any Content that
                                                            contains any viruses, malware, Trojan horses, ransomware, or any
                                                            other similar harmful software; (h) use the Products to post,
                                                            upload, link to, send, distribute, or store any Content that is
                                                            material protected by copyright, trademark, or any other
                                                            proprietary right without first having obtained all rights,
                                                            permissions, and consents necessary to make such Content available
                                                            on or through the Products and to grant Neomobile Advertising LLP
                                                            the limited right to use Content as set forth in these Terms, (i)
                                                            attempt to use any method to gain unauthorized access to any paid
                                                            or restricted features of the Sites or to the Products and its
                                                            related systems or networks, (j) use automated scripts to collect
                                                            information from or otherwise interact with Third Party Services or
                                                            the Products; (k) deep-link to the Sites (other than Neomobile
                                                            Advertising LLP’s home page) for any purpose, unless expressly
                                                            authorized in writing by Neomobile Advertising LLP; (l) impersonate
                                                            any other user of the Products; or (m) use the Products in
                                                            violation of applicable law or any Third Party Service Terms.
                                                        </li>
                                                        <li>
                                                            You agree not to use, and not to knowingly display, distribute, or
                                                            otherwise make content or information derived from the Products
                                                            available to any entity for the purpose of: (i) conducting or
                                                            providing surveillance or gathering intelligence, including but not
                                                            limited to, investigating or tracking individual social media users
                                                            or their content; (ii) tracking, alerting, or other monitoring of
                                                            sensitive events (including but not limited to protests, rallies,
                                                            or community organizing meetings); (iii) conducting or providing
                                                            surveillance, analyses or research that isolates a group of
                                                            individuals or any single individual on social media for any
                                                            unlawful or discriminatory purpose or in a manner that would be
                                                            inconsistent with the individual users’ reasonable expectations of
                                                            privacy; or (iv) targeting, segmenting, or profiling individuals
                                                            based on sensitive personal information, including health (e.g.
                                                            pregnancy), negative financial status or condition, political
                                                            affiliation or beliefs, racial or ethnic origin, religious or
                                                            philosophical affiliation or beliefs, sex life or sexual
                                                            orientation, trade union membership, data relating to any alleged
                                                            or actual commission of a crime, or any other sensitive categories
                                                            of personal information prohibited by law.
                                                        </li>
                                                        <li>
                                                            If you are a government entity or an entity performing services on
                                                            behalf of a government entity whose primary function or mission
                                                            includes conducting surveillance or gathering intelligence, you may
                                                            not access Twitter content through the Products, unless otherwise
                                                            expressly pre-approved by Neomobile Advertising LLP and Twitter.
                                                            Neomobile Advertising LLP and Twitter reserve the right to approve
                                                            each of your use cases for our Products if you are a government
                                                            entity or an entity performing services on behalf of a government
                                                            entity, and failure to obtain such approval may result in
                                                            suspension and potential termination pursuant to Sections 7.2 and
                                                            8.4.
                                                        </li>
                                                        <li>
                                                            We have the right to terminate your account or suspend your access
                                                            to the Products, if we reasonably suspect that you have violated
                                                            any of the restrictions in this Section 8.
                                                        </li>
                                                        <li>
                                                            By accessing or using the Products, you represent and warrant that
                                                            your activities are lawful in every jurisdiction where you access
                                                            or use the Products. Our Products are not intended to hold any
                                                            Sensitive Information. You represent and warrant that you will not
                                                            use our Products to transmit, upload, collect, manage, or otherwise
                                                            process any Sensitive Information. WE WILL NOT BE LIABLE FOR ANY
                                                            DAMAGES THAT MAY RESULT FROM YOUR USE OF OUR PRODUCTS IN
                                                            TRANSMITTING, COLLECTING, MANAGING, OR PROCESSING ANY SENSITIVE
                                                            INFORMATION. “<strong>Sensitive Information</strong>” means any
                                                            passwords, credit card or debit card information, personal
                                                            financial account information, personal health information, social
                                                            security numbers, passport numbers, driver’s license numbers,
                                                            employment records, physical or mental health condition or
                                                            information, any information that would classify as “Special
                                                            Categories of Information” under EU data protection laws, or any
                                                            other information that would be subject to Health Insurance
                                                            Portability and Accountability Act (HIPAA), the Payment Card
                                                            Industry Data Security Standards (PCI DSS), or other laws,
                                                            regulations, or industry standards designed to protect similar
                                                            information.
                                                        </li>
                                                        <li>
                                                            Although we do not monitor content published through our Products
                                                            and are not responsible for any content published through our
                                                            Products, we reserve the right to delete, edit, or move messages or
                                                            materials that we deem necessary to be removed, including, but not
                                                            limited to, public postings, advertisements, and messages.
                                                        </li>
                                                        <li>
                                                            <h4>Inbox Export Feature</h4>
                                                            . With our Inbox Export feature, you can export a copy of the Inbox
                                                            from the Products (“<strong>Inbox Export</strong>”). The Inbox
                                                            Export feature available on our Products may contain Confidential
                                                            Information (defined in Section 9) and/or personal information. By
                                                            initiating an Inbox Export, you acknowledge and agree that we are
                                                            not responsible for, and shall have no liability related to, the
                                                            security of the information contained in the Inbox Export or
                                                            compliance with any applicable law of any federal, state, local, or
                                                            foreign government or political subdivision thereof, including
                                                            applicable privacy law, as a result of fulfilling your request to
                                                            send the Inbox Export.
                                                        </li>
                                                        <li>
                                                            <h4>Link Sharing</h4>
                                                            . With Link Sharing, you can share content from Neomobile
                                                            Advertising LLP via a private or publicly accessible link (“ <strong>Link Sharing</strong>”). Link Sharing may contain certain
                                                            features or functionality that enable you to export information,
                                                            which may include Confidential Information (defined in Section 9)
                                                            and/or personal information, and send links to third-party
                                                            recipients to access data from the Products. By enabling Link
                                                            Sharing, you acknowledge and agree that we are not responsible for,
                                                            and shall have no liability related to, the confidentiality and
                                                            security of the information contained in such export or link or
                                                            compliance with any applicable law of any federal, state, local, or
                                                            foreign government or political subdivision thereof, including
                                                            applicable privacy and data protection laws, as a result of
                                                            fulfilling your request to send such export or link. Any user on
                                                            your Neomobile Advertising LLP account will have the ability to
                                                            create links and share them with anyone via Link Sharing.
                                                        </li>
                                                        <li>
                                                            <h4>Twitter Custom Profile</h4>
                                                            . By associating a custom profile image and/or name with a specific
                                                            Twitter profile, you acknowledge and agree that (i) if an
                                                            individual is depicted, you have consent from such individual to
                                                            display their name and/or likeness in the custom profile, (ii) you
                                                            will indicate in the field provided for the individual’s name
                                                            (e.g., through use of the term “bot”), or in the initial message
                                                            sent to each Twitter user that the individual is not participating
                                                            in the conversation; and (iii) you will comply with all Twitter
                                                            Terms of Service and other applicable acceptable use policy, terms
                                                            of use, or any similar policy or terms.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>CONFIDENTIAL INFORMATION</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            For the purpose of these Terms, “ <strong>Confidential Information</strong>” means non-public
                                                            information disclosed by either party to the other party, either
                                                            directly or indirectly, in writing, orally, or to which the other
                                                            party may have access, which (i) a reasonable person would consider
                                                            confidential, or (ii) is marked “confidential” or “proprietary” or
                                                            some similar designation by the disclosing party. Confidential
                                                            Information will not, however, include any information that (i) was
                                                            publicly known and made generally available in the public domain
                                                            prior to the time of disclosure by the disclosing party; (ii)
                                                            becomes publicly known and made generally available after
                                                            disclosure by the disclosing party to the receiving party other
                                                            than as a result of a violation of these Terms by the receiving
                                                            party; (iii) is already in the possession of the receiving party at
                                                            the time of disclosure by the disclosing party; (iv) is obtained by
                                                            the receiving party from a third party without a breach of the
                                                            third party’s obligations of confidentiality; or (v) is
                                                            independently developed by the receiving party without use of or
                                                            reference to the disclosing party’s Confidential Information. The
                                                            receiving party shall not disclose, use, transmit, inform or make
                                                            available to any entity, person or body any of the Confidential
                                                            Information, except as a necessary part of performing its
                                                            obligations under these Terms, and shall take actions reasonably
                                                            necessary and appropriate to prevent the unauthorized disclosure of
                                                            the Confidential Information, at all times exercising at least a
                                                            reasonable level of care. Each party agrees to restrict access to
                                                            the Confidential Information of the other party to those employees,
                                                            advisors, agents and other representatives who require access in
                                                            order to perform its obligations under these Terms.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>AGENCIES</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            If you are an Agency, you may use our Products on behalf of Users
                                                            that are your clients and charge your clients for such use of our
                                                            Products. As an Agency, you will be liable for all use of the
                                                            Products by your clients. By adding any client to your account, you
                                                            represent and warrant that you have obtained all necessary
                                                            authorizations and consents from such clients to bind them to these
                                                            Terms. If you use the Products on behalf of your clients, or grant
                                                            access to the products to your clients, you will be responsible for
                                                            ensuring that such clients are not able to access confidential or
                                                            proprietary information of another client. “<strong>Agency</strong>
                                                            ” shall mean a business or organization providing advertising,
                                                            marketing, or social media services on behalf of another business,
                                                            person, or group.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <strong>DATA PRIVACY</strong>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            We access your data to enable us to respond to your service
                                                            requests and as necessary to provide you with the Application and
                                                            Products. We share your data with third parties if required by law,
                                                            permitted by you, or pursuant to our Neomobile Advertising LLP
                                                            Privacy Policy (“<strong>Privacy Policy</strong>”), which is
                                                            available
                                                            <a href="https://upview.in/privacy-policy/">
                                                                <strong>here</strong>
                                                            </a>
                                                            and incorporated into these Terms. You agree to all actions that
                                                            are taken with respect to your data that are consistent with our
                                                            Privacy Policy. Before sharing your data, we will take steps
                                                            designed to ensure that any third party service provider maintains
                                                            commercially reasonable data practices for maintaining the
                                                            confidentiality and security of your data and for preventing
                                                            unauthorized access to such data. We do not share your data with
                                                            third parties for their own marketing purposes.
                                                        </li>
                                                        <li>
                                                            You hereby represent and warrant that your Content has not been
                                                            collected, stored, and transferred to us in violation of any law,
                                                            regulation, or contractual obligation applicable to you. You shall
                                                            have sole responsibility for the accuracy, quality, and legality of
                                                            the Content and the means by which you acquired the Content. With
                                                            respect to your Users and any individuals that interact or engage
                                                            with Customer’s social media pages or profiles (including fans,
                                                            followers, and other social media audience members), you shall be
                                                            responsible for establishing the lawfulness of processing under
                                                            Article 6 of the General Data Protection Regulation 2016/679 (“ <strong>GDPR</strong>”) and complying with all applicable laws
                                                            related to privacy and data protection in respect of your use of
                                                            the Products, your processing of personal data, and any processing
                                                            instructions you issue to us.
                                                        </li>
                                                        <li>
                                                            If your use of our Products includes processing “personal data”
                                                            that is subject to the GDPR or “personal information” that is
                                                            subject to the California Consumer Privacy Act, you must enter into
                                                            a Data Processing Addendum (“<strong>DPA</strong>”) with Neomobile
                                                            Advertising LLP.
                                                            Our Privacy Policy as well as any DPA that you enter into with
                                                            Neomobile Advertising LLP forms part of these Terms and applies to
                                                            the processing of personal data. You may review our Privacy Policy
                                                            to understand how we collect and use your data. While Neomobile
                                                            Advertising LLP relies on the
                                                            <a href="https://eur-lex.europa.eu/eli/dec_impl/2021/914/oj?uri=CELEX:32021D0914&amp;locale=en">
                                                                <strong>Standard Contractual Clauses</strong>
                                                            </a>
                                                            approved by the European Commission as the legal basis for the
                                                            transfer of personal data from the EU to a third country, Neomobile
                                                            Advertising LLP maintains its Privacy Shield certification under
                                                            both the EU-U.S. and Swiss-U.S. Privacy Shield frameworks
                                                            established by the U.S. Department of Commerce regarding the
                                                            transfer of personal data from the European Economic Area and/or
                                                            Switzerland, as applicable, to the U.S.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>YOUR RIGHTS AND OUR RIGHTS TO IP</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            <h4>What You Own</h4>
                                                            . You own all of the Content you provide to us. You grant us a
                                                            nonexclusive, revocable, worldwide, limited, fully paid-up and
                                                            royalty-free right to us to use, copy, prepare derivative works of,
                                                            distribute, publish, remove, retain, add, process, or analyze this
                                                            information for the sole purpose of providing the Applications and
                                                            Products to you and your Users. You represent and warrant that you
                                                            are entitled to and authorized to submit the Content and that such
                                                            Content you submit is accurate and not in violation of any
                                                            contractual restrictions or third party rights.
                                                        </li>
                                                        <li>
                                                            <h4>What We Own</h4>
                                                            . We own and retain all rights, title, and interest in and to the
                                                            Products along with all patents, inventions, copyrights,
                                                            trademarks, domain names, trade secrets, know-how, and any other
                                                            intellectual property and/or proprietary rights (“ <strong>Intellectual Property Rights</strong>”) related to the
                                                            Products. Your use of the Products under these Terms does not give
                                                            you additional rights in the Products or ownership of any
                                                            Intellectual Property Rights associated with the Products. Subject
                                                            to your compliance with and limitations set forth in these Terms
                                                            and upon your subscription to the Products, we grant you a
                                                            non-exclusive, non-transferable, non-sublicensable, revocable right
                                                            to access and use our Products and Applications.
                                                        </li>
                                                        <li>
                                                            <h4>Ownership of Your Feedback and Suggestions</h4>
                                                            . Although you are not required to provide feedback or suggestions,
                                                            you assign to us all of your worldwide right, title and interest in
                                                            and to any and all feedback, suggestions, requests,
                                                            recommendations, or other comments that you provide to us regarding
                                                            our Products, including all Intellectual Property Rights therein.
                                                            You shall, upon the request of Neomobile Advertising LLP, its
                                                            successors or assigns, execute any and all documents that may be
                                                            deemed necessary to effectuate this assignment. You also agree to
                                                            waive any right of approval for our use of the rights granted
                                                            herein and agree to waive any moral rights that you may have in any
                                                            feedback, suggestions, or other comments, even if it is altered or
                                                            changed in a manner not agreeable to you. You understand that you
                                                            will not receive any fees, sums, consideration, or remuneration for
                                                            any of the rights granted in this section. Our receipt of your
                                                            feedback, suggestions, and other comments is not an admission of
                                                            their novelty, priority, or originality, and it does not impair our
                                                            right to any existing or future Intellectual Property Rights.
                                                        </li>
                                                        <li>
                                                            <h4>Our Ownership of Statistical Data</h4>
                                                            . You acknowledge and agree that we may aggregate your data and
                                                            information resulting from your or your Users’ use of the Products
                                                            in a manner that does not identify you (“ <strong>Statistical Data</strong>”). You acknowledge that we own
                                                            Statistical Data and that we may use the Statistical Data for any
                                                            lawful purpose and without a duty of accounting to you. You
                                                            acknowledge and agree that we may evaluate data and information
                                                            resulting from your and your Users’ use of the Products in
                                                            non-aggregated form (“<strong>Usage Data</strong>”) in order to
                                                            provide the Products, including, but not limited to, for product
                                                            improvement purposes and customer service. Any Usage Data that is
                                                            considered “personal data” under the GDPR or “personal information”
                                                            under the California Consumer Privacy Act shall be subject to the
                                                            DPA referenced in Section 11.3.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>WARRANTY</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            THE APPLICATIONS AND PRODUCTS ARE PROVIDED ON AN “AS IS” BASIS,
                                                            WITHOUT ANY WARRANTIES, GUARANTEES, CONDITIONS, OR REPRESENTATIONS
                                                            OF ANY KIND. TO THE MAXIMUM EXTENT PERMITTED BY LAW, WE EXPRESSLY
                                                            DISCLAIM ANY AND ALL WARRANTIES, WHETHER EXPRESS, IMPLIED, OR
                                                            STATUTORY, INCLUDING, BUT NOT LIMITED TO, EXPRESS OR IMPLIED
                                                            WARRANTIES OF MERCHANTABILITY, DESIGN, TITLE, QUALITY, FITNESS FOR
                                                            A PARTICULAR PURPOSE, AND NON-INFRINGEMENT. WE CANNOT AND DO NOT
                                                            WARRANT THAT THE APPLICATIONS AND PRODUCTS WILL BE UNINTERRUPTED,
                                                            AVAILABLE, ACCESSIBLE, SECURE, TIMELY, ACCURATE, COMPLETE, FREE
                                                            FROM VIRUSES, OR ERROR-FREE. NEOMOBILE ADVERTISING LLP DISCLAIMS
                                                            ALL LIABILITY FOR ANY MALFUNCTIONING, IMPOSSIBILITY OF ACCESS, OR
                                                            POOR USE CONDITIONS OF THE SERVICES DUE TO INAPPROPRIATE EQUIPMENT,
                                                            DISTURBANCES RELATED TO INTERNET SERVICE PROVIDERS, TO THE
                                                            SATURATION OF THE INTERNET NETWORK OR ANY OTHER ERROR, OMISSION,
                                                            INTERRUPTION, DELETION, DEFECT, DELAY IN OPERATION OR TRANSMISSION,
                                                            COMMUNICATIONS LINE FAILURE, THEFT OR DESTRUCTION OR UNAUTHORIZED
                                                            ACCESS TO, OR ALTERATION OF, DATA NOT WITHIN NEOMOBILE ADVERTISING
                                                            LLP’S REASONABLE CONTROL.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>OUR INDEMNIFICATION OF YOU</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            We agree to defend, indemnify, and hold you harmless from any and
                                                            all claims, losses, demands, liabilities, damages, settlements,
                                                            expenses, and costs (including reasonable attorney’s fees and
                                                            costs) brought by a third party against you alleging your use of
                                                            any Product infringes or misappropriates any patent, copyright,
                                                            trade secret, trademark, or intellectual property right of any
                                                            third party. We will not have any obligation under this section for
                                                            any infringement or misappropriation if it arises out of or is
                                                            based upon: (a) any use of the Products that is in combination with
                                                            other products or services if such infringement or misappropriation
                                                            would not have arisen but for such combination, (b) use of the
                                                            Products by you for purposes not intended, permitted, or outside of
                                                            the scope of the rights granted to you under these Terms, or (c)
                                                            any modification of the Products not made or authorized in writing
                                                            by Neomobile Advertising LLP (the “<strong>Excluded Claims</strong>
                                                            ”). If you are enjoined or otherwise prohibited from using a
                                                            Product or a portion thereof based on an allegation that the
                                                            Product violates any third party intellectual property right, or if
                                                            we reasonably determine that such prohibition is likely, then we
                                                            will, at our sole expense and option: (a) obtain for you the right
                                                            to use the allegedly infringing portions of the Products; (b)
                                                            modify the allegedly infringing portions of the Products so as to
                                                            render them non-infringing without substantially diminishing or
                                                            impairing their functionality, or (c) replace the allegedly
                                                            infringing portions of the Products with non-infringing items of
                                                            substantially similar functionality. If we determine that the
                                                            foregoing remedies are not commercially reasonable, then we may
                                                            terminate the impacted subscription, or portion thereof, and will
                                                            promptly provide a prorated refund or credit to you for any prepaid
                                                            and unused fees.
                                                        </li>
                                                        <li>
                                                            This Section 15 states Neomobile Advertising LLP’s sole and
                                                            exclusive liability, and your sole and exclusive remedy, for the
                                                            actual or alleged infringement or misappropriation of any third
                                                            party Intellectual Property Rights by the Products.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>YOUR INDEMNIFICATION OF US</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            Your failure to comply with any of your obligations set forth in
                                                            these Terms shall be considered a breach of these Terms. You agree
                                                            to defend, indemnify, and hold harmless Neomobile Advertising LLP
                                                            and its Affiliates, and each of its and their respective officers,
                                                            directors, employees, agents, successors, and assigns from any and
                                                            all third party claims, losses, demands, liabilities, damages,
                                                            settlements, expenses, and costs (including attorney’s fees and
                                                            costs), arising from, in connection with, or based on allegations
                                                            of, your or your Users’ breach of these Terms, use of Third-Party
                                                            Services, or for any action arising from the Excluded Claims.
                                                        </li>
                                                        <li>
                                                            <h4>Requirements for Indemnification</h4>
                                                            . Either party’s indemnification obligations shall be contingent
                                                            on: (a) the indemnified party (“<strong>Indemnitee</strong>”)
                                                            providing the indemnifying party (“<strong>Indemnitor</strong>”)
                                                            prompt written notice of the claim, (b) Indemnitee granting
                                                            Indemnitor full and complete control over the defense and
                                                            settlement of the claim, and (c) Indemnitee providing assistance in
                                                            connection with the defense and settlement of the claim as
                                                            Indemnitor shall reasonably request.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>LIMITATION OF LIABILITY</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            <h4>Exclusion of Consequential and Related Damages</h4>
                                                            . NEITHER PARTY NOR ITS AFFILIATES WILL, UNDER ANY CIRCUMSTANCES,
                                                            BE LIABLE TO THE OTHER PARTY, UNDER ANY LEGAL OR EQUITABLE THEORY,
                                                            INCLUDING BREACH OF CONTRACT, TORT (INCLUDING NEGLIGENCE), STRICT
                                                            LIABILITY, OR OTHERWISE, FOR CONSEQUENTIAL, INCIDENTAL, INDIRECT,
                                                            SPECIAL, EXEMPLARY, ENHANCED, OR PUNITIVE DAMAGES ARISING OUT OF OR
                                                            RELATED TO THESE TERMS, INCLUDING BUT NOT LIMITED TO LOST PROFITS,
                                                            REVENUE, BUSINESS, OR DATA; BUSINESS INTERRUPTION; OR LOSS OF
                                                            GOODWILL OR REPUTATION, REGARDLESS OF WHETHER THE PARTY IS APPRISED
                                                            OF THE LIKELIHOOD OF SUCH DAMAGES OCCURRING OR ANY LOSSES OR
                                                            DAMAGES WERE OTHERWISE FORESEEABLE.
                                                        </li>
                                                        <li>
                                                            <h4>Monetary Cap on Liability</h4>
                                                            . UNDER NO CIRCUMSTANCES WILL THE AGGREGATE LIABILITY OF NEOMOBILE
                                                            ADVERTISING LLP AND OUR RESPECTIVE AFFILIATES ARISING OUT OF OR
                                                            RELATED TO THESE TERMS (INCLUDING BUT NOT LIMITED TO WARRANTY
                                                            CLAIMS), REGARDLESS OF THE FORUM AND REGARDLESS OF WHETHER ANY
                                                            ACTION OR CLAIM IS BASED ON CONTRACT, TORT (INCLUDING NEGLIGENCE),
                                                            STRICT LIABILITY, OR ANY OTHER LEGAL OR EQUITABLE THEORY, EXCEED
                                                            THE TOTAL AMOUNT PAID BY YOU TO NEOMOBILE ADVERTISING LLP UNDER THE
                                                            APPLICABLE PLAN DURING THE TWELVE MONTHS PRECEDING THE EVENT GIVING
                                                            RISE TO THE CLAIM. THE FOREGOING LIMITATIONS WILL NOT IN ANY WAY
                                                            LIMIT YOUR PAYMENT OBLIGATIONS UNDER SECTION 6 ABOVE. THE
                                                            LIMITATION OF LIABILITY PROVIDED FOR HEREIN WILL APPLY IN AGGREGATE
                                                            TO YOU AND YOUR AFFILIATES.
                                                        </li>
                                                        <li>
                                                            <h4>Independent Allocations of Risk</h4>
                                                            . EACH PROVISION OF THESE TERMS THAT PROVIDES FOR A LIMITATION OF
                                                            LIABILITY, DISCLAIMER OF WARRANTIES, OR EXCLUSION OF DAMAGES IS TO
                                                            ALLOCATE THE RISKS OF THESE TERMS BETWEEN THE PARTIES. THIS
                                                            ALLOCATION IS REFLECTED IN THE PRICING OFFERED BY NEOMOBILE
                                                            ADVERTISING LLP TO YOU AND IS AN ESSENTIAL ELEMENT OF THE BASIS OF
                                                            THE BARGAIN BETWEEN THE PARTIES. EACH OF THESE PROVISIONS IS
                                                            SEVERABLE AND INDEPENDENT OF ALL OTHER PROVISIONS OF THESE TERMS.
                                                            THE LIMITATIONS IN THIS SECTION WILL APPLY NOTWITHSTANDING THE
                                                            FAILURE OF ESSENTIAL PURPOSE OF ANY LIMITED REMEDY.
                                                        </li>
                                                        <li>
                                                            <h4>
                                                                State Prohibition of Limitation of Liability and Disclaimer of
                                                                Implied Warranties
                                                            </h4>
                                                            . Some states do not allow the exclusion of implied warranties or
                                                            limitation of liability for incidental or consequential damages,
                                                            which means that some of the above limitations may not apply. IN
                                                            THESE STATES, EACH PARTY’S LIABILITY WILL BE LIMITED TO THE
                                                            GREATEST EXTENT PERMITTED BY LAW.
                                                        </li>
                                                    </ol>
                                                    <li>
                                                        <h4>MISCELLANEOUS</h4>
                                                    </li>
                                                    <ol start="0" type="1">
                                                        <li>
                                                            <h4>Use of Logo</h4>
                                                            . As a Customer, you grant us the right to use your company name
                                                            and logo on our website and in any promotional materials press
                                                            releases, investor materials, and other stockholder communications.
                                                            If you do not wish to have your name or logo be used in this way,
                                                            or wish to remove your name or logo from such list, please email <strong><u>info@upview.in</u></strong>
                                                        </li>
                                                        <li>
                                                            <h4>Updates To Terms</h4>
                                                            . We may revise and update these Terms from time to time, in our
                                                            sole discretion. Any changes we make to these Terms are effective
                                                            immediately when we post them. We will provide notice to the
                                                            account owner designated on the account of any material changes.
                                                            Continued use of our Products after we provide you notice of the
                                                            updated Terms shall constitute acceptance of the updated Terms.
                                                        </li>
                                                        <li>
                                                            <h4>Export Compliance and Anti-Corruption</h4>
                                                            . The Products may be subject to export laws and regulations of the
                                                            United States and other jurisdictions. You represent that you are
                                                            not named on any U.S. government denied-party list. You will not
                                                            permit Users or any other third party to access or use the Products
                                                            subject to a U.S. government embargo or in violation of any U.S. or
                                                            other applicable export law or regulation. You further represent
                                                            that you have not received or been offered any illegal or improper
                                                            bribe, kickback, payment, gift, or thing of value in connection
                                                            with your purchase or use of our Products (excluding any reasonable
                                                            gifts and entertainment provided in the ordinary course of
                                                            business).
                                                        </li>
                                                        <li>
                                                            <h4>Federal Government End Use Provisions</h4>
                                                            . If you are a U.S. federal government end user, the Products are
                                                            “Commercial Items” as that term is defined at 48 C.F.R. §2.101,
                                                            consisting of “Commercial Computer Software” and “Commercial
                                                            Computer Software Documentation”, as those terms are used in 48
                                                            C.F.R. §12.212 or 48 C.F.R. §227.7202. Consistent with 48 C.F.R.
                                                            §12.212 or 48 C.F.R. §227.7202-1 through 227.7202-4, as applicable,
                                                            the Products are provided to you with only those rights as provided
                                                            under these Terms.
                                                        </li>
                                                        <li>
                                                            <h4>Assignability</h4>
                                                            . Neither party may assign its right, duties, and obligations under
                                                            these Terms without the other party’s prior written consent, which
                                                            consent will not be unreasonably withheld or delayed, except that
                                                            Neomobile Advertising LLP may assign these Terms, and the rights
                                                            granted to Neomobile Advertising LLP under these Terms, without
                                                            your consent to a successor (including a successor by way of
                                                            merger, acquisition, sale of assets, or operation of law) if the
                                                            successor agrees to assume and fulfill all of Neomobile Advertising
                                                            LLP’s obligations under these Terms.
                                                        </li>
                                                        <li>
                                                            <h4>Notices</h4>
                                                            . Except as otherwise specified in these terms, any notices under
                                                            these Terms must be sent to Neomobile Advertising LLP by email to <strong><u>info@upview.in</u></strong>, with a duplicate copy sent
                                                            via registered mail (return receipt requested) to: Neomobile
                                                            Advertising LLP., Attention: Legal Department; 131 S. Dearborn
                                                            Suite 700, Chicago, Illinois 60603. Any notices under these Terms
                                                            that are sent to you shall be sent via email to the current named
                                                            account owner of your Neomobile Advertising LLP account. You are
                                                            responsible for maintaining the accuracy of the email address and
                                                            other contact information of your named account owner on the
                                                            “Personal Settings” page within the Application.
                                                        </li>
                                                        <li>
                                                            <h4>Force Majeure</h4>
                                                            . Neither party will be liable for, or be considered to be in
                                                            breach of or default under these Terms on account of, any delay or
                                                            failure to perform as required by these Terms (except for your
                                                            obligations to make payments to Neomobile Advertising LLP
                                                            hereunder) as a result of any cause or condition beyond its
                                                            reasonable control, so long as that party uses commercially
                                                            reasonable efforts to avoid or remove the causes of
                                                            non-performance.
                                                        </li>
                                                        <li>
                                                            <h4>Governing Law</h4>
                                                            . These Terms will be interpreted, construed, and enforced in all
                                                            respects in accordance with the local laws of the State of
                                                            Illinois, U.S.A., without reference to its choice of law rules and
                                                            not including the provisions of the 1980 U.N. Convention on
                                                            Contracts for the International Sale of Goods.
                                                        </li>
                                                        <li>
                                                            <h4>Venue</h4>
                                                            . In circumstances where the Agreement to Arbitrate Disputes
                                                            (Section 18.10) permits the parties to litigate in court, these
                                                            Terms shall be governed by and construed in accordance with the
                                                            laws of the State of Illinois, excluding its conflict of law rules.
                                                            Under such limited circumstances, each party hereby expressly and
                                                            irrevocably consents to the exclusive jurisdiction and venue of the
                                                            federal, state, and local courts in Cook County, Illinois in
                                                            connection with such an action.
                                                        </li>
                                                        <li>
                                                            <h4>Agreement to Arbitrate Disputes</h4>
                                                            . You and Neomobile Advertising LLP agree to resolve any claims
                                                            relating to these Terms through final and binding arbitration,
                                                            except to the extent either party has breached or threatened to
                                                            breach its confidentiality obligations or either party has in any
                                                            manner violated or threatened to violate the other party’s
                                                            Intellectual Property Rights. Under such limited circumstances,
                                                            Neomobile Advertising LLP may bring a lawsuit solely for injunctive
                                                            relief to stop unauthorized use or abuse of the Products, or
                                                            intellectual property infringement without first engaging in
                                                            arbitration or the informal dispute-resolution process described
                                                            herein. In all other cases, both parties hereby agree to submit to
                                                            arbitration administered by the American Arbitration Association
                                                            under its Commercial Arbitration Rule with one (1) arbitrator to be
                                                            selected by mutual agreement of the parties. If we cannot agree on
                                                            the arbitrator selection, then the American Arbitration Association
                                                            shall choose an arbitrator for us from the National Panel of
                                                            Arbitrators. You agree that an arbitrator cannot award punitive
                                                            damages to either party and to abide by and perform any award
                                                            rendered by the arbitrator. Judgment upon the award rendered by the
                                                            arbitrator may be entered in any court having jurisdiction, which
                                                            shall include, but not be limited to, the courts within Cook
                                                            County, Illinois.
                                                        </li>
                                                        <li>
                                                            <h4>Waiver and Severability</h4>
                                                            . The waiver by Neomobile Advertising LLP of any term or condition
                                                            set out in these Terms shall not be deemed a further or continuing
                                                            waiver of any other provision of these Terms, and any failure of
                                                            Neomobile Advertising LLP to assert a right or provision under
                                                            these Terms shall not constitute a waiver of such right or
                                                            provision. If any provision of these Terms is held by a court or
                                                            other tribunal of competent jurisdiction to be invalid,
                                                            unenforceable, or illegal for any reason, such provision shall be
                                                            limited to the minimum extent such that the remaining provisions of
                                                            the Terms will continue in full force and effect.
                                                        </li>
                                                        <li>
                                                            <h4>Entire Agreement</h4>
                                                            . Except for any service order, these Terms are the final and
                                                            complete expression of the agreement between these parties
                                                            regarding your use of the Products and Application. These Terms
                                                            supersede, and the terms of these Terms govern, all previous oral
                                                            and written communications regarding these matters. Neomobile
                                                            Advertising LLP will not be bound by, and specifically objects to,
                                                            any term, condition, or other provision that is different from or
                                                            in addition to these Terms (whether or not it would materially
                                                            alter this agreement) that is proffered by you in any receipt,
                                                            invoice, acceptance, purchase order, confirmation, correspondence,
                                                            or otherwise, regardless of Neomobile Advertising LLP’s failure to
                                                            object to such terms, provisions or conditions.
                                                        </li>
                                                        <li>
                                                            <h4>Relationship; Independent Contractor</h4>
                                                            . Nothing herein contained shall be so construed as to constitute
                                                            the parties as principal and agent, employer and employee, partners
                                                            or joint venturers, nor shall any similar relationship be deemed to
                                                            exist between the parties. Neither party shall have any power to
                                                            obligate or bind the other party, except as specifically provided
                                                            herein.
                                                        </li>
                                                        <li>
                                                            <h4>Survival</h4>
                                                            . Section 5 (Use of Third Party Services), Section 6 (Payment
                                                            Terms), Section 7 (Cancellation and Termination), Section 8 (Your
                                                            Use of the Product), Section 9 (Confidential Information). Section
                                                            12 (Your Rights and Our Rights to IP), Section 14 (Warranty),
                                                            Section 15 (Our Indemnification of You), Section 16 (Your
                                                            Indemnification of Us), Section 17 (Limitation of Liability), and
                                                            Section 18 (Miscellaneous) will survive any termination of these
                                                            Terms.
                                                        </li>
                                                    </ol>
                                                </ol>

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
                                            <img src="{{ asset('main/assets/images/resources/logo-white.svg') }}" width="161px" height="60px" alt="" /></a>
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
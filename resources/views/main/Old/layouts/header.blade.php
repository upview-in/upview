<header class="header">
    <div id="active-sticky" class="header-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <a href="{{ route('main.index') }}" class="brand-logo">
                        <img src="{{ asset('main/images/logo/upview.png') }}" alt="brand logo" />
                    </a>
                </div>
                <div class="col-auto">
                    <a class="btn btn-warning btn-hover-warning d-none d-sm-inline-block d-lg-none" href="blog-details.html">Get Started <em class="icofont-arrow-right"></em>
                    </a>

                    <button type="button" class="btn btn-warning offcanvas-toggler" data-bs-toggle="modal" data-bs-target="#offcanvas-modal">
                        <span class="line"></span>
                        <span class="line"></span>
                        <span class="line"></span>
                    </button>
                    <nav class="d-none d-lg-block">
                        <ul class="main-menu text-end">
                            <li class="main-menu-item">
                                <a class="main-menu-link" href="{{ route('main.index') }}">Home</a>
                            </li>
                            <li class="main-menu-item">
                                <a class="main-menu-link" href="https://{{ env('APP_DOMAIN') }}">Get Started</a>
                            </li>
                            {{-- <li class="main-menu-item">
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
                                <a class="btn btn-warning btn-hover-warning btn-lg" href="#">Get Started <em class="icofont-arrow-right"></em>
                                </a>
                            </li> --}}
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
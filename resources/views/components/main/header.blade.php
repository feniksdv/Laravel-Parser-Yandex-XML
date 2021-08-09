<!-- Modal -->
<div class="modal fade offcanvas-modal" id="exampleModal">
    <div class="modal-dialog offcanvas-dialog">
        <div class="modal-content">
            <div class="modal-header offcanvas-header">
                <a class="offcanvas-logo" href="index.html"><img src="{{ asset('front/images/logo/logo.png') }}" alt="logo" /></a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- offcanvas-mobile-menu start -->

            <nav id="offcanvasNav" class="offcanvas-menu">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li><a href="about.html">About</a></li>
                    <li>
                        <a href="javascript:void(0)">Service</a>

                        <ul>
                            <li><a href="service.html">service</a></li>
                            <li><a href="single-service.html">single service</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Pages</a>
                        <ul>
                            <li><a href="faq.html">faq</a></li>
                            <li><a href="team.html">team</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Blog</a>
                        <ul>
                            <li>
                                <a href="blog.html">blog</a>
                            </li>
                            <li>
                                <a href="blog-grid-left-sidebar.html">blog grid left sidebar</a>
                            </li>
                            <li>
                                <a href="blog-grid-right-sidebar.html">blog grid right sidebar</a>
                            </li>
                            <li><a href="blog-details.html">blog details</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                </ul>


            </nav>
            <!-- offcanvas-mobile-menu end -->
        </div>
    </div>
</div>
<header id="active-sticky" class="header-section">
    <!-- Header  Start -->
    <div class="container">
        <div class="row align-items-center">
            <!-- Header Logo Start -->
            <div class="col">
                <div class="header-logo">
                    <a href="index.html"><img src="{{ asset('front/images/logo/logo.png') }}" alt="Site Logo" /></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Menu Start -->
            <div class="col text-end">
                <nav class="main-menu d-none d-lg-block">
                    <ul class="d-flex">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li>
                            <a href="#">Service</a>

                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="service.html">Service</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="single-service.html">single service</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="faq.html">faq</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="team.html">team</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="blog.html">Blog</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="blog-grid-left-sidebar.html">blog grid left sidebar</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="blog-grid-right-sidebar.html">blog grid right sidebar</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="blog-details.html">blog details</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </nav>
                <button class="toggle" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <span class="icon-top"></span>
                    <span class="icon-middle"></span>
                    <span class="icon-bottom"></span>
                </button>
            </div>
            <!-- Header Menu End -->
        </div>
    </div>
    <!-- Header  End -->
</header>

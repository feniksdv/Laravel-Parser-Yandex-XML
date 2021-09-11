<!-- Modal -->
<div class="modal fade offcanvas-modal" id="exampleModal">
    <div class="modal-dialog offcanvas-dialog">
        <div class="modal-content">
            <div class="modal-header offcanvas-header">
                <a class="offcanvas-logo" href="{{ route('home') }}"><img src="{{ asset('front/images/logo/logo.png') }}" alt="logo" /></a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- offcanvas-mobile-menu start -->

            <nav id="offcanvasNav" class="offcanvas-menu">
                <ul>
                    <li><a href="{{ route('home') }}">Главная</a></li>
                    <li>
                        <a href="javascript:void(0)">Услуги</a>

                        <ul>
                            <li><a href="{{ route('order') }}">Заказать выгрузку</a></li>
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
                                <a href="blog.html">Блог</a>
                            </li>
                            <li>
                                <a href="{{ route('category') }}">Рубрики</a>
                            </li>
                            </li>
                            <li>
                                <a href="{{ route('news') }}">Новости</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="{{ route('contact') }}">Контакты</a></li>
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
                    <a href="{{ route('home') }}"><img src="{{ asset('front/images/logo/logo.png') }}" alt="Site Logo" /></a>
                </div>
            </div>
            <!-- Header Logo End -->

            <!-- Header Menu Start -->
            <div class="col text-end">
                <nav class="main-menu d-none d-lg-block">
                    <ul class="d-flex">
                        <li><a href="{{ route('home') }}"><strong>Главная</strong></a></li>
                        <li>
                            <a href="#"><strong>Услуги</strong></a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="{{ route('order') }}">Заказать выгрузку</a>
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
                            <a href="#"><strong>Блог</strong></a>
                            <ul class="sub-menu">
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="{{ route('category') }}">Рубрики</a>
                                </li>
                                <li class="sub-menu-item">
                                    <a class="sub-menu-link" href="{{ route('news') }}">Новости</a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('contact') }}"><strong>Контакты</strong></a></li>
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

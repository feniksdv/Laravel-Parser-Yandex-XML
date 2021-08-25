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
                        <a href="{{ route('page.all') }}"><sctrong>Блог</sctrong></a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">Материалы</a>
                        <ul>
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
                    @if(Auth::user())
                        <li><a href="{{ route('logout') }}">Выйти</a></li>
                    @else
                        <li><a href="{{ route('login') }}">Войти</a></li>
                        <li><a href="{{ route('register') }}">Зарегистрироваться</a></li>
                    @endif
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
                            <a href="{{ route('page.all') }}"><strong>Блог</strong></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><strong>Материалы</strong></a>
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
                        <li>
                            <a href="javascript:void(0)">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                                </svg>
                            </a>

                            <ul class="sub-menu">
                                @if(Auth::user())
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{ route('logout') }}">Выйти</a></li>
                                @else
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{ route('login') }}">Войти</a></li>
                                    <li class="sub-menu-item"><a class="sub-menu-link" href="{{ route('register') }}">Зарегистрироваться</a></li>
                                @endif
                            </ul>
                        </li>
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

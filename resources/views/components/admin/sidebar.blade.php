<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    @if(Auth::user()->customer[0]->is_admin)
        <a href="{{ route('admin.dashboard') }}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Админка</span>
        </a>
    @else
        <a href="{{ route('account') }}" class="brand-link">
            <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Аккаунт</span>
        </a>
    @endif
    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(Auth::user()->customer[0]->avatar)
                    <img src="{{ Auth::user()->customer[0]->avatar }}" class="img-circle elevation-2" alt="User Image">
                @else
                    <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                @endif
            </div>
            <div class="info">
                <a href="{{ route('account') }}" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        @if(Auth::user()->customer[0]->is_admin)
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item menu-open">
                        <ul class="nav nav">
                            <li class="nav-item">
                                <a href="{{ route('admin.dashboard') }}" class="nav-link @if(request()->routeIs('admin.dashboard')) active @endif">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.user.*')) active @endif">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Пользователи
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.user.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все пользователи</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.resources.*')) active @endif">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Url
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.resources.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все Url</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.resources.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить Url</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.categories.*')) active @endif">
                            <i class="nav-icon fas fa-list"></i>
                            <p>
                                Категории
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все категории</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.categories.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить категорию</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.news.*')) active @endif">
                            <i class="nav-icon fas fa-newspaper"></i>
                            <p>
                                Новости
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.news.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все новости</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.news.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Добавить новость</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.contact.*')) active @endif">
                            <i class="nav-icon fas fa-sms"></i>
                            <p>
                                Сообщения
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.contact.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все сообщения</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link @if(request()->routeIs('admin.order.*')) active @endif">
                            <i class="nav-icon fab fa-jedi-order"></i>
                            <p>
                                Заказы
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.order.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Все заказы</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">Настройки</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">О сервисе</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Политика конф-ности</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Соглашение</p>
                        </a>
                    </li>
                </ul>
            </nav>
        @else
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-header">Настройки</li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">О сервисе</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-warning"></i>
                            <p>Политика конф-ности</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Соглашение</p>
                        </a>
                    </li>
                </ul>
            </nav>
        @endif

        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

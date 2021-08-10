<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Админка</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Администратор</a>
            </div>
        </div>

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
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

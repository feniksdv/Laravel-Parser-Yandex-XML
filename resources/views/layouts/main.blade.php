<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8') }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0') }}" />
    <title>Агрегатор новостей</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front/images/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/vendor/vendor.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/plugins/plugins.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('front/css/style.min.css') }}" />
</head>
<body>
    <!-- Modal -->
    <x-main.header></x-main.header>
    <!-- Banner Section Start -->
    @if(request()->routeIs('news.*') || request()->routeIs('category.*'))
        <x-main.baner :listCategory="$listCategory" :id="$id"></x-main.baner>
    @else
        <x-main.baner></x-main.baner>
    @endif
    <!-- Banner Section End -->
    <!-- Blog Section Start -->
        @yield('content')
    <!-- Blog Section ENd -->
    <!-- News letter Section Start Subscribe-->
    <x-main.subscribe></x-main.subscribe>
    <!-- News letter Section End Subscribe-->
    <x-main.footer></x-main.footer>
    <script src="{{ asset('front/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('front/js/waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/vendor/parallax.js') }}"></script>
    <script src="{{ asset('front/js/plugins/plugins.min.js') }}"></script>
    <script src="{{ asset('front/js/ajax-contact.js') }}"></script>
    <script src="{{ asset('front/js/main.min.js')}}"></script>
</body>
</html>

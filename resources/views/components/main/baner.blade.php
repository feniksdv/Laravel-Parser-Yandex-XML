<section class="banner-section position-relative">
    <img class="banner-shape" src="{{ asset('front/images/banner/shape1.png') }}" alt="shape" />
    <div class="container">
        <div class="row">
            <!-- Banner-Content Start -->
            <div class="col-md-6">
                <div class="banner-content banner-padding">
                    <h3 class="title">
                        @if(request()->is('news'))
                            Новости
                        @elseif(request()->is('category'))
                            Рубрики
                        @elseif(request()->is('contact'))
                            Контакты
                        @elseif(request()->is('order'))
                            Услуги
                        @else
                            Главная
                        @endif
                    </h3>
                    <p>
                        @if(request()->is('news'))
                            Все новости
                        @elseif(request()->is('category'))
                            Если перейти в рубрику, <br>то выведутся новости этой рубрики
                        @elseif(request()->is('contact'))
                            Задайте свой вопрос, <br>через форму обратной связи
                        @elseif(request()->is('order'))
                            Закажите у нас выгрузку данных <br>на первый заказ скидка 25%
                        @else
                            Агрегатор новостей
                        @endif
                    </p>
                </div>
            </div>
            <!-- Banner-Content End -->

            <!-- Banner-Content Start -->
            <div class="col-md-6 mt-7 mt-md-0">
                <div class="banner-content scene banner-img">
                    <div data-depth="0.2">
                        <img src="{{ asset('front/images/blog/banner.png') }}" alt="img" />
                    </div>
                </div>
            </div>
            <!-- Banner-Content End -->
        </div>
    </div>
</section>

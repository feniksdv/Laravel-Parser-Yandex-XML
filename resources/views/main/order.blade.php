@extends('layouts.main')
@section('content')
    <!-- Service Section Start -->
    <section class="contact-section section-py">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-xl-6 col-lg-6 mb-7">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Закажите выгрузку</h3>
                        <p>
                            Закажите выгрузку данных из какого-либо источника.
                            <br class="d-none d-xl-block" />
                            Постарайтесь описать свою задачу как можно конкретнее.
                        </p>
                    </div>
                    <!-- contact-title-section end -->

                    <form id="contactForm" class="row" action="{{ route('admin.order.store') }}" method="POST">
                    @csrf
                    <!-- assets/php/contact.php -->
                        <div class="col-12 col-sm-6 mb-7">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя*" value="{{ old('name') }}" />
                        </div>
                        <div class="col-12 col-sm-6 mb-7">
                            <input type="tel" class="form-control" id="phone" name="number" placeholder="Ваш телефон*" value="{{ old('number') }}" />
                        </div>
                        <div class="col-12 col-sm-6 mb-7">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ваш Email*" value="{{ old('email') }}" />
                        </div>

                        <div class="col-12 mb-9">
                            <textarea class="form-control massage-control" name="massage" id="massage" cols="30" rows="10" placeholder="Ваше сообщение" value="{{ old('massage') }}"></textarea>
                        </div>
                        <div class="col-12">
                            <button id="contactSubmit" type="submit" class="btn btn-dark btn-hover-dark" data-complete-text="Well Done!">
                                Заказать
                            </button>
                            <p class="form-message mt-3"></p>
                        </div>
                    </form>

                </div>

                <div class="col-xl-5 col-lg-6 mb-7 offset-xl-1">
                    <div class="contact-address text-center">
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Пример заказа:</h4>
                            <p>
                                Хочу чтобы вы собрали данные с сайтов:
                            </p>
                                <ul>
                                <li>https://ea.ru</li>
                                <li>https://net.ru</li>
                            </ul>

                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Данные</h4>
                            <p>Данные предоставить в Excel.</p>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title">Сроки</h4>
                            <p>Как можно быстрее</p>
                        </div>
                        <!-- address-list end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section ENd -->
@endsection

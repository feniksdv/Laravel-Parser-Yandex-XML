@extends('layouts.main')
@section('content')
    <!-- Service Section Start -->
    <section class="contact-section section-py">
        <div class="container">
            <div class="row mb-n7">
                <div class="col-xl-6 col-lg-6 mb-7">
                    <!-- contact-title-section start -->
                    <div class="contact-title-section">
                        <h3 class="title">Связь с Администрацией проекта </h3>
                        <p>
                            Задайте свой вопрос или оставьте ваш отзыв по работе проекта.
                            <br class="d-none d-xl-block" />
                            Мы ответим вам в ближайшее время на указанную вами почту.
                        </p>
                    </div>
                    <!-- contact-title-section end -->

                    <form id="contactForm" class="row" action="{{ route('admin.contact.store') }}" method="POST">
                        @csrf
                        <!-- assets/php/contact.php -->
                        <div class="col-12 col-sm-6 mb-7">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя*" value="{{ old('name') }}" />
                        </div>
                        <div class="col-12 col-sm-6 mb-7">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Ваш Email*" value="{{ old('email') }}" />
                        </div>

                        <div class="col-12 mb-9">
                            <textarea class="form-control massage-control" name="massage" id="massage" cols="30" rows="10" placeholder="Ваше сообщение">{{ old('massage') }}</textarea>
                        </div>
                        <div class="col-12">
                            <button id="contactSubmit" type="submit" class="btn btn-dark btn-hover-dark" data-complete-text="Well Done!">
                                Отправить
                            </button>
                            <p class="form-message mt-3"></p>
                        </div>
                    </form>

                </div>

                <div class="col-xl-5 col-lg-6 mb-7 offset-xl-1">
                    <div class="contact-address text-center">
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Наши офисы</h4>
                            <p>
                                ул. Льва Толстого, 16, Москва
                            </p>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list mb-4 mb-xl-10 pb-2">
                            <h4 class="title">Наши телефоны</h4>
                            <ul>
                                <li>
                                    <a class="phone-number" href="tel:+12345678987">+7 (495) 000-70-00</a>
                                </li>
                                <li>
                                    <a class="phone-number" href="tel:+98745612321">+7 (495) 000-70-70</a>
                                </li>
                            </ul>
                        </div>
                        <!-- address-list end -->
                        <!-- address-list start -->
                        <div class="address-list">
                            <h4 class="title">Web Адрес</h4>
                            <ul>
                                <li>
                                    <a class="mailto" href="mailto:info@example.com">info@localhost.com</a>
                                </li>
                                <li>
                                    <a class="mailto" href="mailto:www.example.com">www.localhost.com</a>
                                </li>
                            </ul>
                        </div>
                        <!-- address-list end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Service Section ENd -->
@endsection

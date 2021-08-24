@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Подтвердите Ваш email-адрес') }}</div>

                    <div class="card-body">
                        @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                {{ __('Новая ссылка для подтверждения была отправлена на Ваш email-адрес.') }}
                            </div>
                        @endif

                        {{ __('Прежде чем продолжить, пожалуйста, проверьте ссылку подтверждения в своей электронной почте.') }}
                        {{ __('Если Вы не получили письмо') }},
                        <form class="d-inline" method="POST" action="{{ url('/email/verification-notification') }}">
                            @csrf
                            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь, чтобы запросить еще раз') }}</button>.
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

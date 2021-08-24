@extends('layouts.admin')
@section('content')
    <div class="content-wrapper">
        <h1>Привет, {{ Auth::user()->name }}</h1>

            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                {{ __('Выйти') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

    </div>
@endsection

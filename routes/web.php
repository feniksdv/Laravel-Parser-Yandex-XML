<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return "Домашняя страница";
});

Route::get('/home/{slag}', function (string $slag) {
    return "Домашняя страница для {$slag}";
});

Route::get('/about', function () {
    return "О компании";
});

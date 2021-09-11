<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\ContactController as AdminContactController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;

/* * * * * *
* Фронт    *
* * * * * */
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('contact', ContactController::class)->name('contact');
Route::get('order', OrderController::class)->name('order');


/* * * * * * *
* Категории  *
* * * * * * */
Route::group(['prefix' => 'category'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/show/{id}', [CategoryController::class, 'show'])->where('id', '\d+')->name('category.show');
});

/* * * * * *
* Новости  *
* * * * * */
Route::group(['prefix' => 'news'], function() {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/show/{id}', [NewsController::class, 'show'])->where('id', '\d+')->name('news.show');
});

/* * * * * *
* Админка  *
* * * * * */
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/', DashboardController::class)->name('dashboard');
    Route::resource('categories', AdminCategoryController::class);
    Route::resource('news', AdminNewsController::class);
    Route::resource('contact', AdminContactController::class);
    Route::resource('order', AdminOrderController::class);
});

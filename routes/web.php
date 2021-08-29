<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use \App\Http\Controllers\SocialController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use \App\Http\Controllers\Admin\ContactController as AdminContactController;
use \App\Http\Controllers\Admin\OrderController as AdminOrderController;
use \App\Http\Controllers\Admin\UserController as AdminUserController;

use \App\Http\Controllers\Account\IndexController as AccountController;
use \App\Http\Controllers\Account\SaveFormProfileController as AccountControllerProfile;
use \App\Http\Controllers\Account\SaveFormPasswordController as AccountControllerPassword;

/* * * * * *
* Фронт    *
* * * * * */
Route::get('/', [HomeController::class, 'index'])->name('home');
/* * * * * *
* Контакты *
* * * * * */
Route::group(['prefix'=>'contact'], function(){
    Route::get('/', [ContactController::class, 'index'])->name('contact');
    Route::post('store', [ContactController::class, 'store'])->name('contact.store');
});

/* * * * * *
* Заказ    *
* * * * * */
Route::group(['prefix'=>'order'], function(){
    Route::get('/', [OrderController::class, 'index'])->name('order');
    Route::post('store', [OrderController::class, 'store'])->name('order.store');
});


/* * * * * * *
* Страницы  *
* * * * * * */
Route::group(['prefix' => 'page'], function(){
    Route::get('all', [PageController::class, 'index'])->name('page.all');
    Route::get('{page}', [PageController::class, 'show'])->name('page.show');
});

/* * * * * * *
* Категории  *
* * * * * * */
Route::group(['prefix' => 'category'], function() {
    Route::get('/', [CategoryController::class, 'index'])->name('category');
    Route::get('/show/{category}', [CategoryController::class, 'show'])->where('id', '\d+')->name('category.show');
});

/* * * * * *
* Новости  *
* * * * * */
Route::group(['prefix' => 'news'], function() {
    Route::get('/', [NewsController::class, 'index'])->name('news');
    Route::get('/show/{news}', [NewsController::class, 'show'])->where('news', '\d+')->name('news.show');
});

/* * * * * * * * * * * * * * *
* Авторизация через соц.сети *
* * * * * * * * * * * * * * */
Route::group(['middleware' => 'guest'], function (){
    Route::get('/init/{socialAll}', [SocialController::class, 'init'])->name('init.social');
    Route::get('/callback/{socialAll}', [SocialController::class, 'callback'])->name('callback.social');
});

/* * * * * *
* Админка  *
* * * * * */
Route::group(['middleware' => 'verified'], function (){

    //Личный кабинет (Профиль пользователя)
    Route::group(['prefix' => 'account'], function (){
        Route::get('/', AccountController::class)->name('account');
        Route::post('/password/{password}', AccountControllerPassword::class)->name('account.save.form.password');
        Route::post('/profile/{profile}', AccountControllerProfile::class)->name('account.save.form.profile');
    });
    //админка
    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin'], function() {
        Route::get('/', DashboardController::class)->name('dashboard');
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('news', AdminNewsController::class);
        Route::resource('contact', AdminContactController::class);
        Route::resource('order', AdminOrderController::class);
        Route::resource('user', AdminUserController::class);
    });
});



//чистим кеш
Route::get('/clear', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');

    return "Кэш очищен.";
});

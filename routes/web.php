<?php

use Illuminate\Contracts\Session\Session;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale()], function () {
    Route::get('/', function () {
        return view('auth.Login');
    })->middleware('guest');
    Auth::routes();
    Route::get('home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

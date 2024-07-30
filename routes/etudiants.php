<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>'auth'], function () {
    Route::resource('etudiant', 'EtudiantController');
    Route::get('etudiant/search', 'EtudiantController@search')->name('search');
    Route::get('etudiant/niveau/{id}', 'EtudiantController@etudiant_niveau')->name('etudiantNiveau');
});

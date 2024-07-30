<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;



Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware'=>'auth'], function () {
Route::get('paiement/validerPaiement/{id}', 'paiementController@validerPaiement')->name('paiement.validerPaiement');
Route::resource('paiement', 'paiementController');
Route::post('paiement/search', 'PaiementController@search')->name('searchPaiement');
Route::get('Etudiant/Paiements/chercher', 'PaiementController@chercherPaiementsEtudiant')
        ->name('cherherpaiements');
Route::post('paiement/create', 'paiementController@EtudiantId')->name('paiement.create');
});

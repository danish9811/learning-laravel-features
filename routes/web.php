<?php

use App\Http\Controllers\PassportAuthController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;

Route::controller(PassportAuthController::class)->group(static function () {
    Route::get('/login', 'showLoginForm')->name('login');   // the same as above
    Route::get('/register', 'showRegisterForm')->name('register');  // the same as above
    Route::post('/login-submit', 'passportAuthLoginSubmit');
    Route::post('/register-submit', 'passportAuthRegisterSubmit');
    Route::get('/chart', 'showApexChart')->middleware('auth')->name('apex-chart');
});

Route::controller(SearchController::class)->group(static function () {
    Route::get('/search', 'index')->name('search');
    Route::get('/autocomplete', 'autocomplete')->name('autocomplete');
});

<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\PassportAuthController;
use Illuminate\Support\Facades\Route;


// these routes can be made simpler

Route::view('/', 'dashboard');
Route::resource('/books', BookController::class);

Route::get('/login', [PassportAuthController::class, 'showLoginForm'])->name('login');
Route::get('/register', [PassportAuthController::class, 'showRegisterForm'])->name('register');

Route::post('/login-submit', [PassportAuthController::class, 'passportAuthLoginSubmit']);
Route::post('/register-submit', [PassportAuthController::class, 'passportAuthRegisterSubmit']);

Route::get('/chart', [PassportAuthController::class, 'showApexChart'])
    ->middleware('auth')
    ->name('apex-chart');



// all the above routes can be shorten by this method, phpstorm does not understand these routes
Route::controller(PassportAuthController::class)->group(static function() {
    Route::get('/login', 'showLoginForm')->name('login');   // the same as above
    Route::get('/register', 'showRegisterForm')->name('register');  // the same as above
    Route::post('/login-submit', 'passportAuthLoginSubmit');
    Route::post('/register-submit', 'passportAuthRegisterSubmit');
    Route::get('/chart', 'showApexChart')->middleware('auth')->name('apex-chart');
});

// now phpstorm 2021.2 is supporting laravel 9 routes by install laravel idea
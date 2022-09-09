<?php

use App\Http\Controllers\MesonetApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/get-weather-via-http', [MesonetApiController::class, 'getMesonetApiResultViaHttp']);

// issue in this endpoint | laravel version with the otif lib
Route::get('/get-weather-via-otif-curl', [MesonetApiController::class, 'getMesonetApiResultViaOtifCurl']);
Route::get('/get-weather-via-curl', [MesonetApiController::class, 'getMesonetApiResultViaCurl']);


// by updating the otif-curl will fix this
// all the api routes are shorten down | how nice these are
Route::controller(MesonetApiController::class)->group(static function() {
    Route::get('/get-weather-via-curl', 'getMesonetApiResultViaOtifCurl');
    Route::get('/get-weather-via-http', 'getMesonetApiResultViaHttp');
    Route::get('/get-weather-via-curl', 'getMesonetApiResultViaCurl');
});


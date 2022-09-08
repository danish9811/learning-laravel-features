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

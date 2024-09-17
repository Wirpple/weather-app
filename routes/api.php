<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/cities', [CityController::class, 'store']);

Route::get('/cities', [CityController::class, 'index']);

Route::get('/weather/{city}', [WeatherController::class, 'getWeather']);

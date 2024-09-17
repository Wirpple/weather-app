<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Services\WeatherService;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class WeatherController extends Controller
{
    protected WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getWeather($cityId): \Illuminate\Http\JsonResponse
    {
        try {
            $city = City::findOrFail($cityId);
            $weather = $this->weatherService->getWeather($city->latitude, $city->longitude);

            return response()->json($weather);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Город не найден'], 404);
        }
    }
}

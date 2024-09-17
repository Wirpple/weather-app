<?php

namespace Tests\Feature;

use App\Services\WeatherService;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class WeatherServiceTest extends TestCase
{
    public function test_it_returns_weather_data_when_api_request_is_successful(): void
    {
        Http::fake([
            'api.openweathermap.org/*' => Http::response([
                'coord' => ['lon' => 37.6173, 'lat' => 55.7558],
                'weather' => [
                    [
                        'main' => 'Clear',
                        'description' => 'clear sky',
                    ],
                ],
                'main' => [
                    'temp' => 22.5,
                    'humidity' => 60,
                ],
                'wind' => [
                    'speed' => 5.1,
                ]
            ], 200)
        ]);

        $weatherService = new WeatherService();
        $result = $weatherService->getWeather(55.7558, 37.6173);

        $this->assertNotNull($result);
        $this->assertEquals('clear sky', $result['weather'][0]['description']);
        $this->assertEquals(22.5, $result['main']['temp']);
        $this->assertEquals(60, $result['main']['humidity']);
        $this->assertEquals(5.1, $result['wind']['speed']);
    }

    public function test_it_returns_null_when_api_request_fails(): void
    {
        Http::fake([
            'api.openweathermap.org/*' => Http::response(null, 404)
        ]);

        $weatherService = new WeatherService();
        $result = $weatherService->getWeather(55.7558, 37.6173);

        $this->assertNull($result);
    }
}

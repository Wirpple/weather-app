<?php

namespace Tests\Feature;

use App\Models\City;
use App\Services\WeatherService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Mockery;
use Tests\TestCase;

class WeatherControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->mockWeatherService = Mockery::mock(WeatherService::class);
        $this->app->instance(WeatherService::class, $this->mockWeatherService);
    }

    public function test_it_returns_weather_for_existing_city(): void
    {
        $city = City::factory()->create([
            'name' => 'Moscow',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ]);

        $this->mockWeatherService
            ->shouldReceive('getWeather')
            ->with($city->latitude, $city->longitude)
            ->andReturn([
                'weather' => [
                    ['description' => 'clear sky'],
                ],
                'main' => [
                    'temp' => 22.5,
                ],
            ]);

        $response = $this->getJson("/api/weather/{$city->id}");

        $response->assertStatus(200);
        $response->assertJsonFragment([
            'description' => 'clear sky',
            'temp' => 22.5,
        ]);
    }

    public function test_it_returns_404_if_city_not_found(): void
    {
        $response = $this->getJson('/api/weather/999');
        $response->assertStatus(404);
        $response->assertJson(['error' => 'Город не найден']);
    }
}

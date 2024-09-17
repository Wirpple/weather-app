<?php

namespace Tests\Feature;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CityControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_it_can_store_a_city_successfully(): void
    {
        $data = [
            'name' => 'Moscow',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ];

        $response = $this->postJson('/api/cities', $data);

        $response->assertStatus(200);
        $response->assertJson(['message' => 'Город успешно добавлен']);

        $this->assertDatabaseHas('cities', [
            'name' => 'Moscow',
            'latitude' => 55.7558,
            'longitude' => 37.6173,
        ]);
    }

    public function test_it_returns_validation_error_when_data_is_missing(): void
    {
        $response = $this->postJson('/api/cities', []);

        $response->assertStatus(422);
        $response->assertJsonStructure([
            'message',
            'errors' => ['name', 'latitude', 'longitude'],
        ]);
    }

    public function test_it_returns_all_cities(): void
    {
        City::factory()->create(['name' => 'Moscow', 'latitude' => 55.7558, 'longitude' => 37.6173]);
        City::factory()->create(['name' => 'Saint Petersburg', 'latitude' => 59.9343, 'longitude' => 30.3351]);

        $response = $this->getJson('/api/cities');

        $response->assertStatus(200);

        $response->assertJsonFragment(['name' => 'Moscow']);
        $response->assertJsonFragment(['name' => 'Saint Petersburg']);
    }
}

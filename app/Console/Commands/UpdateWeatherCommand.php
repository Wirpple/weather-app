<?php

namespace App\Console\Commands;

use App\Models\City;
use App\Services\WeatherService;
use Illuminate\Console\Command;

class UpdateWeatherCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Обновление погодных данных для всех городов';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $cities = City::all();
        $weatherService = app(WeatherService::class);

        foreach ($cities as $city) {
            $weatherData = $weatherService->getWeather($city->latitude, $city->longitude);

            if ($weatherData) {
                $this->info("Обновленная погода для {$city->name}: " . $weatherData['weather'][0]['description']);
            } else {
                $this->error("Не удалось получить погоду для {$city->name}");
            }
        }

        $this->info('Обновление погоды завершено.');
    }
}

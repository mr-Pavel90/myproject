<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\WeatherRecord;

class WeatherParser
{
    protected array $cities = [
        'Kyiv', 'Lviv', 'Odesa', 'Kharkiv', 'Dnipro', 'Zaporizhzhia'
    ];

    public function run()
    {
        // Random city
        $city = $this->cities[array_rand($this->cities)];

        // get data from weather API (example Open-Meteo)
        $response = Http::get('https://api.open-meteo.com/v1/forecast', [
            'latitude' => 50.45,
            'longitude' => 30.52,
            'start_date' => now()->subDays(30)->toDateString(),
            'end_date' => now()->toDateString(),
            'daily' => 'temperature_2m_max,temperature_2m_min',
            'timezone' => 'auto',
        ]);

        if (!$response->ok()) {
            throw new \Exception('Error receiving weather data');
        }

        $data = $response->json();

        // save data in db
        foreach ($data['daily']['time'] as $index => $date) {
            WeatherRecord::create([
                'city' => $city,
                'date' => $date,
                'temperature' => $data['daily']['temperature_2m_max'][$index],
            ]);
        }

        return count($data['daily']['time']);
    }
}

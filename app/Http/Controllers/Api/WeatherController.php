<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeatherRecord;
use App\Http\Requests\StoreWeatherRequest;
use App\Http\Requests\UpdateWeatherRequest;

class WeatherController extends Controller
{
    public function getWeather()
    {
        $weather = WeatherRecord::all();

        return response()->json([
            'message'    => 'list all weather',
            'data'       => $weather,
            'totalCount' => $weather->count(),
        ]);
    }  
    
    public function getOne($id)
    {
        $weather = WeatherRecord::find($id);

        if (!$weather) {
            return response()->json([
                'message' => 'weather not found'
            ], 404);
        }

        return response()->json([
            'message' => 'list weather',
            'data'    => $weather
        ]);
    }

    public function store(StoreWeatherRequest $request)
    {
        $weather = WeatherRecord::create($request->validated());

        return response()->json([
            'message' => 'weather created successfully',
            'data' => $weather
        ], 201);
    }

    public function delete($id)
    {
        $weather = WeatherRecord::find($id);

        if (!$weather) {
            return response()->json([
                'message' => 'weather not found'
            ], 404);
        }

        $weather->delete();

        return response()->json([
            'message' => 'weather deleted successfully'
        ]);
    }

   public function update(UpdateWeatherRequest $request, $id)
    {
        $weather = WeatherRecord::find($id);

        if (!$weather) {
            return response()->json([
                'message' => 'weather not found'
            ], 404);
        }

        $weather->update($request->validated());

        return response()->json([
            'message' => 'weather updated successfully',
            'data'    => $weather
        ]);
    }
}

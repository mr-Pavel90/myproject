<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\WeatherRecord;

class WeatherController extends Controller
{
    public function getWeather(Request $request)
    {
        $request->validate([
            'city' => 'required|string',
        ]);

        $city = $request->input('city');
        $records = WeatherRecord::where('city', $city)->orderBy('date', 'desc')->get();

         if ($records->isEmpty()) {
            return back()->with('error', "data of city «{$city}» not found.");
        }

        return view('weather.weather_table', [
            'city'    => $city,
            'records' => $records,
        ]);
    }

public function show($id)
{
    $rec = WeatherRecord::find($id);

    if (!$rec) {
        return response()->json([
            'message' => 'record not found'
        ], 404);
    }

    return response()->json([
        'message' => 'single record',
        'data' => $rec
    ]);
}
}
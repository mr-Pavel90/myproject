<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

 // Login
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

// Register
Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    // user
    Route::get('users', [\App\Http\Controllers\Api\UserController::class, 'index']);
    Route::post('users', [\App\Http\Controllers\Api\UserController::class, 'store']);
    Route::delete('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'delete']);
    Route::put('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'update']);
    Route::get('users/{id}', [\App\Http\Controllers\Api\UserController::class, 'getUser']);

    // weather
    Route::get('weather', [\App\Http\Controllers\Api\WeatherController::class, 'getWeather']);
    Route::get('/weather/{id}', [\App\Http\Controllers\Api\WeatherController::class, 'getOne']);
    Route::post('weather', [\App\Http\Controllers\Api\WeatherController::class, 'store']);
    Route::delete('weather/{id}', [\App\Http\Controllers\Api\WeatherController::class, 'delete']);
    Route::put('weather/{id}', [\App\Http\Controllers\Api\WeatherController::class, 'update']);

    // Logout
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});

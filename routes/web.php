<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NailsController;
use App\Http\Controllers\WeatherController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// user
Route::get('/users', [UserController::class, 'index']);
Route::get('/user-form', function () {
    return view('users.user_form');
});
Route::post('/user', [UserController::class, 'store'])->name('store.user');

Route::get('/nails', [NailsController::class, 'index'])->middleware('role:admin');
Route::get('/users-nails', [NailsController::class, 'getUsersNails']);

Route::get('/mail-form', function () {
    return view('email.mail_form');
});
Route::post('/send-mail', [MailController::class, 'send'])->name('send.mail');

Route::get('/weather', function () {
    return view('weather.weather_form');
});
Route::get('/get-weather', [WeatherController::class, 'getWeather'])->name('get.weather');

// Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('api')->group(function () {
    Route::resource('scooters', \App\Http\Controllers\ScooterController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('booking', \App\Http\Controllers\BookingController::class);
});

Route::middleware('api')->group(function () {
    Route::resource('rental_points', \App\Http\Controllers\RentalPointController::class);
});

Route::middleware('api')->group(function (){
    Route::resource('users', \App\Http\Controllers\UserController::class);
});

Route::post('/rentals/update', [\App\Http\Controllers\RentalController::class, 'update']);

Route::middleware('api')->group(function (){
    Route::resource('rentals', \App\Http\Controllers\RentalController::class);
});

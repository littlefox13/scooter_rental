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

/*
Route::middleware('api')->group(function () {
    Route::resource('scooters', \App\Http\Controllers\ScooterController::class);
});
*/

Route::middleware('auth:api')->group(function () {
    Route::resource('booking', \App\Http\Controllers\BookingController::class);
    Route::resource('rental_points', \App\Http\Controllers\RentalPointController::class);
    Route::resource('scooters', \App\Http\Controllers\ScooterController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);
    Route::post('/rentals/update', [\App\Http\Controllers\RentalController::class, 'update']);
    Route::resource('rentals', \App\Http\Controllers\RentalController::class);
    Route::resource('/reports', \App\Http\Controllers\ReportController::class);
});


Route::prefix('auth')->group(function(){
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->name('logout');
    Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');
    Route::post('init', [App\Http\Controllers\API\AuthController::class, 'init'])->name('init');

    Route::group(['middleware'=>'auth'], function(){
        Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
        Route::post('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register']);
        //Route::post('init', [\App\Http\Controllers\API\AuthController::class, 'init']);

        //Route::get('init', [App\Http\Controllers\API\AuthController::class, 'init'])->name('init');
    });
});



Route::middleware('auth:api')->group(function(){

});
/*
Route::middleware('auth')->group(function(){
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
});*/
/*
Route::prefix('auth')->group(function(){
    //Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
    Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
    Route::get('init', [\App\Http\Controllers\API\AuthController::class, 'init']);
    Route::group(['middleware'=>'auth'], function(){

    });
});*/




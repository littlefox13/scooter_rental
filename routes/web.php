<?php

use App\Models\Rental;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScooterController;
use App\Http\Controllers\RentalController;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

//Route::resource('scooters', ScooterController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('{any}', function () {
    return view('app');
})->where('any', '.*');

Route::prefix('auth')->group(function(){
    Route::post('login', [App\Http\Controllers\API\AuthController::class, 'login'])->name('login');
    Route::post('logout', [App\Http\Controllers\API\AuthController::class, 'logout'])->name('logout');
    Route::post('init', [\App\Http\Controllers\API\AuthController::class, 'init'])->name('init');
    Route::post('register', [App\Http\Controllers\API\AuthController::class, 'register'])->name('register');

    Route::group(['middleware'=>'auth'], function(){
        //Route::post('login', [\App\Http\Controllers\API\AuthController::class, 'login']);
        //Route::post('init', [\App\Http\Controllers\API\AuthController::class, 'init']);
        //Route::post('init', [\App\Http\Controllers\API\AuthController::class, 'init']);
        Route::post('logout', [\App\Http\Controllers\API\AuthController::class, 'logout']);
        //Route::get('init', [App\Http\Controllers\API\AuthController::class, 'init'])->name('init');
    });
});
Route::prefix('api')->group( function(){

    Route::group(['middleware' => 'auth'], function(){
        Route::resource('booking', \App\Http\Controllers\BookingController::class);
        Route::resource('rental_points', \App\Http\Controllers\RentalPointController::class)->middleware('isAdmin');
        Route::resource('scooters', \App\Http\Controllers\ScooterController::class)->middleware('isAdmin');
        Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('isAdmin');
        Route::post('/rentals/update', [\App\Http\Controllers\RentalController::class, 'update'])->middleware('isManagerOrAdmin');
        Route::resource('rentals', \App\Http\Controllers\RentalController::class)->middleware('isManagerOrAdmin');
        Route::resource('/reports', \App\Http\Controllers\ReportController::class)->middleware('isAdmin');
    });
});

Route::get('test', function(){

    echo "<pre>";
    $tmp = \Illuminate\Support\Facades\Auth::user();
    print_r($tmp);
    echo "</pre>";
    $tmp = Auth::user();
    echo "<pre>";
    print_r($tmp);
    echo "</pre>";
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



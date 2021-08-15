<?php

use App\Models\Rental;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScooterController;
use App\Http\Controllers\RentalController;

use Illuminate\Database\Seeder;
use Illuminate\Http\Request;

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

Route::resource('scooters', ScooterController::class);

Route::resource('rentals', RentalController::class);

Route::resource('booking', \App\Http\Controllers\BookingController::class)->only(['index','store']);

Route::resource('user', \App\Http\Controllers\UserController::class)->only(['index','show','update']);

Route::resource('report', \App\Http\Controllers\ReportController::class);

Route::post('report/show', [\App\Http\Controllers\ReportController::class, 'show']);

Route::get('test', function(){
    echo '123';
    echo "<pre>";
Rental::all();
    print_r(Rental::groupBy('manager_id')->groupBy('name')->selectRaw('manager_id, name, sum(cost) as sum')->leftJoin('users', 'users.id', '=', 'rentals.manager_id')->get()->toArray()) ;
    echo "</pre>";

    echo "<pre>";

    echo "</pre>";
});

Route::get('/', function () {
    echo "<pre>";
    print_r(\App\Models\User::all());
    echo "</pre>";

    return view('welcome', ['users' => \App\Models\User::all()]);
});

Route::get('/rental_points', function(){
    return view('rental_points', ['rental_points' => \App\Models\RentalPoint::all()]);
});

Route::post('/rental_points', function (Request $request) {

    $rental_point = new \App\Models\RentalPoint();
    $rental_point->address = $request->address;
    $rental_point->save();

    return redirect('/rental_points');
});

Route::delete('/rental_point/{rental_point}', function (\App\Models\RentalPoint $rental_point) {
    $rental_point->delete();

    return redirect('/rental_points');
});


Route::post('/rental_point/update/{rental_point}', function (\App\Models\RentalPoint $rental_point, Request $request) {

    echo '<pre>';
    print_r($rental_point->address);
    echo '</pre>';
    echo '<pre>';
    print_r($request->address);
    echo '</pre>';
    $rental_point->address = $request->address;
    $rental_point->save();
    return redirect('/rental_points');
});

Route::get('/managers', function(){
    echo '<pre>';

    $tmps = \App\Models\User::getManagers();

    echo '</pre>';
    return view('managers', ['managers' => \App\Models\User::getManagers()]);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

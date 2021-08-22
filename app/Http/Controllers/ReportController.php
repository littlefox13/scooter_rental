<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentalPoint;
use App\Models\Scooter;
use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller {
    public function index()
    {
        return view('report');
    }

    public function show($type)
    {

        switch ($type){
            case 'manager':
                $data = Rental::groupBy('manager_id')->groupBy('name')->selectRaw('manager_id as id, name, sum(cost) as sum')->leftJoin('users', 'users.id', '=', 'rentals.manager_id')->get()->toArray();
                return $data;
                break;

            case 'rental_point':
                $data = Rental::groupBy('rental_point_id')->groupBy('name')
                                    ->selectRaw('rental_point_id as id, address as name, sum(cost) as sum')
                                    ->leftJoin('rental_points', 'rental_points.id', '=', 'rentals.rental_point_id')
                                    ->get()->toArray();
                return $data;
                break;

            case 'scooter':
                $data = Rental::groupBy('scooter_id')->groupBy('name')
                    ->selectRaw('scooter_id as id, description as name, sum(cost) as sum')
                    ->leftJoin('scooters', 'scooters.id', '=', 'rentals.scooter_id')
                    ->get()->toArray();
                return $data;
                break;

            case 'user':
                $data = Rental::groupBy('user_id')->groupBy('name')
                    ->selectRaw('user_id as id, name, sum(cost) as sum')
                    ->leftJoin('users', 'users.id', '=', 'rentals.user_id')
                    ->where('role_id', '=', '3')
                    ->get()->toArray();
                return $data;
                break;
        }
    }
}

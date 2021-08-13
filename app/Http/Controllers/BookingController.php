<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentalPoint;
use App\Models\RentalStatuse;
use App\Models\Scooter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Object_;

class BookingController extends RentalController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scooters = Scooter::all()->keyBy('id');
        $rental_points = RentalPoint::all()->keyBy('id');
        return view('booking', [
            'scooters' => $scooters,
            'rental_points' => $rental_points]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'scooter_id' => 'required',
            'rental_point_id' => 'required',
            'reservation_time' => 'required'
        ]);

        $request->request->set('user_id', Auth::id());
        $request->request->set('reservation_time', Carbon::createFromFormat('Y-m-d\TH:i', $request->reservation_time)->addMinutes(15)->timestamp);
        $request->request->set('rental_status_id', 3);

        //return $request->all();
        Rental::create($request->all());

        return redirect()->route('rentals.index')
            ->with('success','Rent successfully started.');
    }
}

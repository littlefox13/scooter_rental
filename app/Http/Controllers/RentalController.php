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

class RentalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rentals = Rental::all()->sortBy('id');
        $scooters = Scooter::all()->keyBy('id');
        $rental_points = RentalPoint::all()->keyBy('id');
        $users = User::all()->keyBy('id');
        $rental_statuses = RentalStatuse::all()->keyBy('id');
        return view('rentals', ['rentals' => $rentals,
                                        'scooters'=>$scooters,
                                        'users'=>$users,
                                        'rental_points' =>$rental_points,
                                        'rental_statuses'=>$rental_statuses]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $scooters = Scooter::all()->toArray();
        $users = User::all()->toArray();
        $rental_points = RentalPoint::all()->toArray();
        $rental_statuses = RentalStatuse::all()->toArray();
        return view('rentals.create', [
                                            'scooters'=>$scooters,
                                            'users'=>$users,
                                            'rental_points'=>$rental_points,
                                            'rental_statuses'=>$rental_statuses]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'scooter_id' => 'required',
            'user_id' => 'required',
            'rental_point_id' => 'required',
            'rental_status_id' => 'required',
            'collateral_data' => 'required',
            'reservation_time' => 'required'
        ]);

        $request->request->set('reservation_time', Carbon::now()->timestamp);
        $request->request->set('rental_status_id', $request->rental_status_id?$request->rental_status_id:1);
        $request->request->set('manager_id', Auth::id());

        Rental::create($request->all());
        return redirect()->route('rentals.index')
            ->with('success','Rent successfully started.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function show(Rental $rental)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function edit(Rental $rental)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rental $rental)
    {

        switch ($request->action) {
            case 'end':
                $rental->rental_status_id = 2;
                $rental->reservation_time = Carbon::now()->timestamp;
                $rental->save();
                return redirect()->route('rentals.index')
                    ->with('success','Rent successfully ended.');
                break;
            case 'start':
                $rental->rental_status_id = 1;
                $rental->reservation_time = Carbon::now()->timestamp;
                $rental->manager_id = Auth::id();

                $rental->save();
                return redirect()->route('rentals.index')
                    ->with('success','Rent successfully started.');
                break;
            case 'update':

                break;
        }
        return redirect()->route('rentals.index')
            ->with('success','Rent successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rental  $rental
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rental $rental)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Scooter;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ScooterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scooters = Scooter::all();
        $mytime = Carbon::now()->subMinutes(15)->timestamp;
        $time = Carbon::now()->subMinutes(13)->timestamp;
        $tmp = DB::table('rentals')->where('rental_status_id', '=','3')
            ->where('reservation_time', '<', $mytime)->get();
        return view('scooters', ['scooters' => $scooters, 'test'=>$tmp]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'description' => 'required'
        ]);

        Scooter::create($request->all());

        return redirect()->route('scooters.index')
            ->with('success','Scooter created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function show(Scooter $scooter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function edit(Scooter $scooter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Scooter $scooter)
    {
        $request->validate([
            'description' => 'required',
        ]);

        $scooter->update($request->all());

        return redirect()->route('scooters.index')
                         ->with('success','Scooter with id: '.$scooter->id.' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Scooter $scooter)
    {
        $scooter->delete();

        return redirect()->route('scooters.index')
            ->with('success','Scooter '.$scooter->description.' delete successfully');
    }
}

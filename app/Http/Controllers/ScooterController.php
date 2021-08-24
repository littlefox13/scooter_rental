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
    public function __construct()
    {

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scooters = Scooter::all()->toArray();
        return $scooters;
        //return view('scooters', ['scooters' => $scooters, 'test'=>$tmp]);
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

        return response()->json('Scooter created successfully');
        /*
        return redirect()->route('scooters.index')
            ->with('success','Scooter created successfully.');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scooter = Scooter::find($id);
        return response()->json($scooter);
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
    public function update($id, Request $request)
    {
        $scooter = Scooter::find($id);

        $scooter->update($request->all());

        return response()->json('Scooter updated successfully');

        /*return redirect()->route('scooters.index')
                         ->with('success','Scooter with id: '.$scooter->id.' updated successfully');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Scooter  $scooter
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scooter = Scooter::find($id);
        $scooter->delete();

        return response()->json('Scooter deleted successfully');
        /*return redirect()->route('scooters.index')
            ->with('success','Scooter '.$scooter->description.' delete successfully');*/
    }
}

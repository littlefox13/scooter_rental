<?php

namespace App\Http\Controllers;

use App\Models\RentalPoint;
use Illuminate\Http\Request;

class RentalPointController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rental_point = RentalPoint::all()->toArray();
        return $rental_point;
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
            'address' => 'required'
        ]);

        $rental_point = RentalPoint::create($request->all());

        return response()->json($rental_point);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\RentalPoint  $rentalPoint
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rental_point = RentalPoint::find($id);
        return response()->json($rental_point);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\RentalPoint  $rentalPoint
     * @return \Illuminate\Http\Response
     */
    public function edit(RentalPoint $rentalPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\RentalPoint  $rentalPoint
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $rental_point = RentalPoint::find($id);

        $rental_point->update($request->all());

        return response()->json('RentalPoint updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\RentalPoint  $rentalPoint
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rentalPoint = RentalPoint::find($id);
        $rentalPoint->delete();

        return response()->json($id);
    }
}

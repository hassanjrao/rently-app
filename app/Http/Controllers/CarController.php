<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Car;
use App\Models\CarEngine;
use App\Models\Location;
use App\Models\Seat;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {



        $selectedVehicleTypes=$request->vehicle_types ? explode(',',$request->vehicle_types) : [];
        $selectedBodyTypes=$request->body_types ? explode(',',$request->body_types) : [];
        $selectedSeats=$request->seats ? explode(',',$request->seats) : [];
        $selectedEngines=$request->engines ? explode(',',$request->engines) : [];



        $cars=Car::latest()
        ->when(!empty($selectedVehicleTypes),function($query) use($selectedVehicleTypes){
            return $query->whereIn('vehicle_type_id',$selectedVehicleTypes);
        })
        ->when(!empty($selectedBodyTypes),function($query) use($selectedBodyTypes){
            return $query->whereIn('body_type_id',$selectedBodyTypes);
        })
        ->when(!empty($selectedSeats),function($query) use($selectedSeats){
            return $query->whereIn('seat_id',$selectedSeats);
        })
        ->when(!empty($selectedEngines),function($query) use($selectedEngines){
            return $query->whereIn('car_engine_id',$selectedEngines);
        })
        ->with(['seat','vehicleType','bodyType','transmission'])
        ->paginate(10);

        $vehicleTypes=VehicleType::latest()->get();
        $bodyTypes=BodyType::latest()->get();
        $seats=Seat::latest()->get();
        $engines=CarEngine::latest()->get();

        return view('front.cars.index',compact('cars','vehicleTypes','bodyTypes','seats','engines','selectedVehicleTypes','selectedBodyTypes','selectedSeats','selectedEngines'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car=Car::with(['features','images','seat','vehicleType','bodyType','transmission'])
        ->findOrFail($id);

        $locations=Location::latest()->get();

        return view('front.cars.show',compact('car','locations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

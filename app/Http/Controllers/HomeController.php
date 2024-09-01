<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Car;
use App\Models\CarEngine;
use App\Models\News;
use App\Models\Seat;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $cars=Car::latest()
        ->with(['seat','vehicleType','bodyType','transmission'])
        ->take(10)->get();

        $latestNews=News::latest()->take(3)->get();

        $vehicleTypes=VehicleType::all();
        $bodyTypes=BodyType::all();
        $seats=Seat::all();
        $carEngines=CarEngine::all();

        return view('front.home',compact('cars','latestNews','vehicleTypes','bodyTypes','seats','carEngines'));
    }
}

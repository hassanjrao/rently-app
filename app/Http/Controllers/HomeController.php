<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\News;
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

        return view('front.home',compact('cars','latestNews'));
    }
}

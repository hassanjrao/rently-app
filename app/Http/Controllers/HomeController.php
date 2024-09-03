<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Car;
use App\Models\CarEngine;
use App\Models\Faq;
use App\Models\News;
use App\Models\PrivacyPolicy;
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

        // get faqs in two columns
        $firstColumnFaqs=Faq::latest()->take(ceil(Faq::count()/2))->get();
        $secondColumnFaqs=Faq::latest()->skip(ceil(Faq::count()/2))->take(Faq::count())->get();

        return view('front.home',compact('cars','latestNews','vehicleTypes','bodyTypes','seats','carEngines','firstColumnFaqs','secondColumnFaqs'));
    }


    public function aboutUs(){

        return view('front.about-us.index');
    }

    public function termsConditions(){

        return view('front.terms-conditions.index');
    }

    public function privacyPolicy(){

        $privacyPolicy=PrivacyPolicy::first();

        return view('front.privacy-policy.index',compact('privacyPolicy'));
    }
}

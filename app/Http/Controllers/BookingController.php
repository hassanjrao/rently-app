<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function quickBooking(Request $request)
    {

        $cars = Car::latest()->get();

        $locations = Location::latest()->get();

        $car=Car::find($request->car);

        $user = User::find(auth()->id());

        return view('front.bookings.quick', compact('cars', 'locations','car','user'));
    }

    public function quickStore(Request $request)
    {

        // dd($request->all());
        // "car" => "4"
        // "pick_up_location" => "1"
        // "destination_location" => "1"
        // "pick_up_date" => "August 23, 2024"
        // "pick_up_time" => "03:00"
        // "return_date" => "August 16, 2024"
        // "return_time" => "22:00"
        // "name" => "Keane Briggs"
        // "email" => "wyda@mailinator.com"
        // "phone" => "+1 (886) 249-1675"
        // "message" => "In maiores itaque ve"

        $request->validate([
            'car' => 'required|exists:cars,id',
            'pick_up_location' => 'required|exists:locations,id',
            'destination_location' => 'required|exists:locations,id',
            'pick_up_date' => 'required|date',
            'return_date' => 'required|date',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'nullable|string|max:255',
            'address'=>'required',
            'date_of_birth'=>'required|date',
            'driver_license_number'=>'required',
            'driver_license_state'=>'required',
            'lead_from'=>'nullable',
            'driver_license_front_image'=>'required|image',
            'driver_license_back_image'=>'required|image',
            'proof_of_income'=>'required|image',
        ]);

        $user = User::firstOrCreate([
            'email' => $request->email,
        ], [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt('password'),
        ]);


        Booking::create([
            'car_id' => $request->car,
            'user_id' => $user->id,
            'pickup_location_id' => $request->pick_up_location,
            'destination_location_id' => $request->destination_location,
            'pickup_date_time' => $request->pick_up_date,
            'return_date_time' => $request->return_date,
            'request' => $request->message,
            'address'=>$request->address,
            'date_of_birth'=>$request->date_of_birth,
            'driver_license_number'=>$request->driver_license_number,
            'driver_license_state'=>$request->driver_license_state,
            'lead_from'=>$request->lead_from,
            'driver_license_front_image'=>$request->file('driver_license_front_image')->store('bookings'),
            'driver_license_back_image'=>$request->file('driver_license_back_image')->store('bookings'),
            'proof_of_income'=>$request->file('proof_of_income')->store('bookings'),

        ]);

        // add bookingCreated in session
        session()->put('bookingCreated', true);

        return redirect()->back()->withToastSuccess('Booking created successfully');
    }

    public function bookings(Request $request)
    {

        $request->validate([
            'car' => 'required|exists:cars,id',
            'pick_up_location' => 'required|exists:locations,id',
            'destination_location' => 'required|exists:locations,id',
            'pick_up_date' => 'required|date',
            'pick_up_time' => 'required',
            'return_date' => 'required|date',
            'return_time' => 'required',
        ]);

        $user = User::find(auth()->id());

        Booking::create([
            'car_id' => $request->car,
            'user_id' => $user->id,
            'pickup_location_id' => $request->pick_up_location,
            'destination_location_id' => $request->destination_location,
            'pickup_date_time' => date('Y-m-d H:i:s', strtotime($request->pick_up_date . ' ' . $request->pick_up_time)),
            'return_date_time' => date('Y-m-d H:i:s', strtotime($request->return_date . ' ' . $request->return_time)),
            'request' => $request->message,
        ]);


        return redirect()->back()->withToastSuccess('Booking created successfully');
    }
}

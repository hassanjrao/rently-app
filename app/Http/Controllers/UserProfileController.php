<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view('front.profile.index');
    }

    public function dashboard(){

        $user=auth()->user();


        $totalBookings=$user->bookings()->count();

        $cancelledBookings=$user->bookings()->where('status','cancelled')->count();
        $completedBookings=$user->bookings()->where('status','completed')->count();


        // last 2 days bookings
        $recentBookings=$user->bookings()->where('created_at','>=',now()->subDays(2))
        ->with(['car','pickupLocation','destinationLocation'])
        ->get();

        $upComingBookings=$user->bookings()->where('pickup_date_time','>=',now())->count();


        return view('front.profile.dashboard',compact('user','recentBookings','upComingBookings','totalBookings','cancelledBookings','completedBookings'));
    }


    public function userBookings(){
        $user=auth()->user();

        $bookings=$user->bookings()->with(['car','pickupLocation','destinationLocation'])->get();

        return view('front.profile.bookings',compact('bookings'));
    }

    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->id(),
            'password' => 'nullable|min:8|confirmed',
            'phone'=>'required'
        ]);

        $user = auth()->user();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        if($request->password){
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->withToastSuccess('Updated successfully');
    }
}

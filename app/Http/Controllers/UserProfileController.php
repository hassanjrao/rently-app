<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index(){
        return view('front.profile.index');
    }

    public function dashboard(){
        return view('front.profile.dashboard');
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

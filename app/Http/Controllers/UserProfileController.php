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
}

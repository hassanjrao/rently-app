<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting=Setting::first();

        return view('admin.settings.index',compact('setting'));
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
        //
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
        $setting=Setting::findorfail($id);

        $request->validate([
            'phone'=>'required',
            'email'=>'required|email',
            'timings'=>'required',
            'address'=>'required',
            'facebook'=>'required',
            'instagram'=>'required',
            'twitter'=>'required',
            'about'=>'required',
        ]);

        $setting->update([
            'phone'=>$request->phone,
            'email'=>$request->email,
            'timings'=>$request->timings,
            'address'=>$request->address,
            'facebook'=>$request->facebook,
            'instagram'=>$request->instagram,
            'twitter'=>$request->twitter,
            'about'=>$request->about,
        ]);

        Artisan::call('config:cache');
        Artisan::call('cache:clear');
        Artisan::call('optimize:clear');

        return redirect()->route('admin.settings.index')->withToastSuccess('Updated successfully');
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

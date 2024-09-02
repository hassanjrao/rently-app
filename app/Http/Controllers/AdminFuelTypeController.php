<?php

namespace App\Http\Controllers;

use App\Models\FuelType;
use Illuminate\Http\Request;

class AdminFuelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fuelTypes=FuelType::latest()->get();

        return view('admin.fuel-types.index',compact('fuelTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuelType=null;

        return view('admin.fuel-types.add_edit',compact('fuelType'));
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
            'name'=>'required',
        ]);

        FuelType::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.fuel-types.index')->withToastSuccess('Created successfully');
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
        $fuelType=FuelType::findorfail($id);

        return view('admin.fuel-types.add_edit',compact('fuelType'));
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
        $request->validate([
            'name'=>'required',
        ]);

        $fuelType=FuelType::findorfail($id);

        $fuelType->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.fuel-types.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        FuelType::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

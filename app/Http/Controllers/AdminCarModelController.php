<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use App\Models\CarModel;
use Illuminate\Http\Request;

class AdminCarModelController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carModels=CarModel::latest()
        ->with('carMake')
        ->get();

        return view('admin.car-models.index',compact('carModels'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carModel=null;


        $carMakes=CarMake::latest()->get();

        return view('admin.car-models.add_edit',compact('carModel','carMakes'));
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
            'car_make'=>'required',
        ]);

        CarModel::create([
            'name'=>$request->name,
            'car_make_id'=>$request->car_make,
        ]);

        return redirect()->route('admin.vehicle-models.index')->withToastSuccess('Created successfully');
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
        $carModel=CarModel::findorfail($id);

        $carMakes=CarMake::latest()->get();

        return view('admin.car-models.add_edit',compact('carModel','carMakes'));
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

        $carmodels=CarModel::findorfail($id);

        $carmodels->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.vehicle-models.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarModel::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

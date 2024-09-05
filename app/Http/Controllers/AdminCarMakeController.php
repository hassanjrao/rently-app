<?php

namespace App\Http\Controllers;

use App\Models\CarMake;
use Illuminate\Http\Request;

class AdminCarMakeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carMakes=CarMake::latest()->get();

        return view('admin.car-makes.index',compact('carMakes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carMake=null;

        return view('admin.car-makes.add_edit',compact('carMake'));
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

        CarMake::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.vehicle-make.index')->withToastSuccess('Created successfully');
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
        $carMake=CarMake::findorfail($id);

        return view('admin.car-makes.add_edit',compact('carMake'));
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

        $carMake=CarMake::findorfail($id);

        $carMake->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.vehicle-make.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarMake::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

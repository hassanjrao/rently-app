<?php

namespace App\Http\Controllers;

use App\Models\CarEngine;
use Illuminate\Http\Request;

class AdminCarEngineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carEngines=CarEngine::latest()->get();

        return view('admin.car-engines.index',compact('carEngines'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $carEngine=null;

        return view('admin.car-engines.add_edit',compact('carEngine'));
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

        CarEngine::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.car-engines.index')->withToastSuccess('Created successfully');
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
        $carEngine=CarEngine::findorfail($id);

        return view('admin.car-engines.add_edit',compact('carEngine'));
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

        $carEngines=CarEngine::findorfail($id);

        $carEngines->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.car-engines.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CarEngine::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use Illuminate\Http\Request;

class AdminBodyTypeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bodyTypes=BodyType::latest()->get();

        return view('admin.body-types.index',compact('bodyTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodyType=null;

        return view('admin.body-types.add_edit',compact('bodyType'));
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

        BodyType::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.body-types.index')->withToastSuccess('Created successfully');
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
        $bodyType=BodyType::findorfail($id);

        return view('admin.body-types.add_edit',compact('bodyType'));
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

        $bodyType=BodyType::findorfail($id);

        $bodyType->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.body-types.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        BodyType::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

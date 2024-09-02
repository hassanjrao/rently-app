<?php

namespace App\Http\Controllers;

use App\Models\DriveType;
use Illuminate\Http\Request;

class AdminDriveTypeController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $driveTypes=DriveType::latest()->get();

        return view('admin.drive-types.index',compact('driveTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $driveType=null;

        return view('admin.drive-types.add_edit',compact('driveType'));
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

        DriveType::create([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.drive-types.index')->withToastSuccess('Created successfully');
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
        $driveType=DriveType::findorfail($id);

        return view('admin.drive-types.add_edit',compact('driveType'));
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

        $driveType=DriveType::findorfail($id);

        $driveType->update([
            'name'=>$request->name,
        ]);

        return redirect()->route('admin.drive-types.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DriveType::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

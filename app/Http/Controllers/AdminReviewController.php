<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class AdminReviewController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reviews=Review::latest()->get();

        return view('admin.reviews.index',compact('reviews'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $review=null;

        return view('admin.reviews.add_edit',compact('review'));
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
            'review_title'=>'required',
            'review'=>'required',
            'image_path'=>'required|image',
        ]);

        Review::create([
            'name'=>$request->name,
            'review_title'=>$request->review_title,
            'review'=>$request->review,
            'image_path'=>$request->file('image_path')->store('reviews'),
        ]);

        return redirect()->route('admin.reviews.index')->withToastSuccess('Created successfully');
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
        $review=Review::findorfail($id);

        return view('admin.reviews.add_edit',compact('review'));
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
        $reviews=Review::findorfail($id);

        $request->validate([
            'name'=>'required',
            'review_title'=>'required',
            'review'=>'required',
            'image_path'=>'nullable|image',
        ]);

        $reviews->update([
            'name'=>$request->name,
            'review_title'=>$request->review_title,
            'review'=>$request->review,
        ]);

        if($request->hasFile('image_path')){
            $reviews->update([
                'image_path'=>$request->file('image_path')->store('reviews'),
            ]);
        }


        return redirect()->route('admin.reviews.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Review::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

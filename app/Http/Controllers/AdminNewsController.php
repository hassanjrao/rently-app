<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class AdminNewsController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $news=News::latest()->get();

        return view('admin.news.index',compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $news=null;

        return view('admin.news.add_edit',compact('news'));
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
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'image'=>'required|image',
        ]);

        News::create([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
            'image'=>$request->file('image')->store('news'),
        ]);

        return redirect()->route('admin.news.index')->withToastSuccess('Created successfully');
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
        $news=News::findorfail($id);

        return view('admin.news.add_edit',compact('news'));
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
        $news=News::findorfail($id);

        $request->validate([
            'title'=>'required',
            'short_description'=>'required',
            'description'=>'required',
            'image'=>'image',
        ]);

        $news->update([
            'title'=>$request->title,
            'short_description'=>$request->short_description,
            'description'=>$request->description,
        ]);

        if($request->hasFile('image')){
            $news->update([
                'image'=>$request->file('image')->store('news'),
            ]);
        }
        

        return redirect()->route('admin.news.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        News::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

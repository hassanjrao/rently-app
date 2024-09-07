<?php

namespace App\Http\Controllers;

use App\Models\ContactUsRequest;
use App\Models\Faq;
use App\Models\User;
use App\Notifications\ContactUsNotification;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstColumnFaqs=Faq::latest()->take(ceil(Faq::count()/2))->get();
        $secondColumnFaqs=Faq::latest()->skip(ceil(Faq::count()/2))->take(Faq::count())->get();


        return view('front.contact-us.index',compact('firstColumnFaqs','secondColumnFaqs'));
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
        $request->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'message'=>'required'
        ]);

       $contactUsReq= ContactUsRequest::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'message'=>$request->message
        ]);

        $admin=User::whereHas('roles',function ($q){
            $q->where('name','admin');
        })->first();

        $admin->notify(new ContactUsNotification($contactUsReq));

        return redirect()->back()->withToastSuccess('Successfully submitted your request. We will get back to you soon.');
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
        //
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

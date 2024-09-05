<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class AdminPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments=Payment::latest()->get();

        return view('admin.payments.index',compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $payment=null;

        $paymentMethods=PaymentMethod::latest()->get();
        $bookings=Booking::latest()->get();

        return view('admin.payments.add_edit',compact('payment','paymentMethods','bookings'));
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
            'booking_id'=>'required',
            'payment_method'=>'required',
            'amount'=>'required',
            'date'=>'required',
            'time'=>'required',
            'term'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
        ]);

        Payment::create([
            'booking_id'=>$request->booking_id,
            'payment_method_id'=>$request->payment_method,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'time'=>$request->time,
            'term'=>$request->term,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.payments.index')->withToastSuccess('Created successfully');
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
        $payment=Payment::findorfail($id);

        $paymentMethods=PaymentMethod::latest()->get();
        $bookings=Booking::latest()->get();

        return view('admin.payments.add_edit',compact('payment','paymentMethods','bookings'));
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
        $payment=Payment::findorfail($id);

        $request->validate([
            'booking_id'=>'required',
            'payment_method'=>'required',
            'amount'=>'required',
            'date'=>'required',
            'time'=>'required',
            'term'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'status'=>'required',
        ]);

        $payment->update([
            'booking_id'=>$request->booking_id,
            'payment_method_id'=>$request->payment_method,
            'amount'=>$request->amount,
            'date'=>$request->date,
            'time'=>$request->time,
            'term'=>$request->term,
            'start_date'=>$request->start_date,
            'end_date'=>$request->end_date,
            'status'=>$request->status,
        ]);

        return redirect()->route('admin.payments.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::findorfail($id)->delete();

        return redirect()->route('admin.payments.index')->withToastSuccess('Deleted successfully');
    }
}

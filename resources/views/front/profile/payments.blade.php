@extends('layouts.front')

@section('page-title', 'My Payments')

@section('content')
    <div class="no-bottom zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/14.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>My Payments</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-settings" class="bg-gray-100">
            <div class="container">
                <div class="row">

                    <x-profile-sidebar />

                    <div class="col-lg-9">

                        <div class="card p-4 rounded-5 mb25">

                            <table class="table de-table">
                                <thead>
                                    <tr>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Booking ID</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Payment
                                                Method</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Amount</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Date</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Time</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Term</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Start Date</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">End Date</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                                <div class="badge bg-gray-100 text-dark">
                                                    {{ $payment->booking->booking_id }}
                                                </div>
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Payment Method</span>
                                                {{ $payment->paymentMethod->name }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Status</span>
                                                @if ($payment->status == 'pending')
                                                    <span class="badge bg-warning">Pending</span>
                                                @elseif ($payment->status == 'received')
                                                    <span class="badge bg-success">Received</span>
                                                @elseif ($payment->status == 'declined')
                                                    <span class="badge bg-danger">Declined</span>
                                                @elseif ($payment->status == 'requested')
                                                    <span class="badge bg-info">Requested</span>
                                                @endif
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Amount</span>
                                                {{ $payment->amount }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Date</span>
                                                {{ $payment->date }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Time</span>
                                                {{ $payment->time }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Term</span>
                                                {{ $payment->term }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Start Date</span>
                                                {{ $payment->start_date }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">End Date</span>
                                                {{ $payment->end_date }}
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                            </table>

                        </div>


                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@extends('layouts.front')

@section('page-title', 'My Bookings')

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
                            <h1>My Bookings</h1>
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
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Order ID</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Car Name</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up
                                                Location</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Drop Off
                                                Location</span></th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Pick Up Date</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Return Date</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td><span class="d-lg-none d-sm-block">Order ID</span>
                                                <div class="badge bg-gray-100 text-dark">
                                                    {{ $booking->booking_id }}
                                                </div>
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Car Name</span><span class="bold">
                                                    {{ $booking->car->name }}
                                                </span>
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Pick Up Location</span>
                                                {{ $booking->pickupLocation->name }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Drop Off Location</span>
                                                {{ $booking->destinationLocation->name }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Pick Up Date</span>
                                                {{ $booking->pickup_date_time }}
                                            </td>
                                            <td><span class="d-lg-none d-sm-block">Return Date</span>
                                                {{ $booking->return_date_time }}
                                            </td>
                                            <td>
                                                @if ($booking->status == 'cancelled')
                                                    <div class="badge rounded-pill bg-danger">cancelled</div>
                                                @elseif($booking->status == 'completed')
                                                    <div class="badge rounded-pill bg-success">completed</div>
                                                @else
                                                    <div class="badge rounded-pill bg-warning">pending</div>
                                                @endif
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

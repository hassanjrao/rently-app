@extends('layouts.front')

@section('page-title', 'Dashboard')

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
                            <h1>Dashboard</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-cars" class="bg-gray-100">
            <div class="container">
                <div class="row">
                    <x-profile-sidebar />


                    <div class="col-lg-9">
                        <div class="row">
                            <div class="col-lg-3 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar-check-o"></i>
                                    </div>
                                    <span class="h1 mb0">{{ $upComingBookings }}</span>
                                    <span class="text-gray">Upcoming Bookings</span>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar"></i>
                                    </div>
                                    <span class="h1 mb0">
                                        {{ $totalBookings }}
                                    </span>
                                    <span class="text-gray">Total Bookings</span>
                                </div>
                            </div>


                            <div class="col-lg-3 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar-check-o"></i>
                                    </div>
                                    <span class="h1 mb0">{{ $completedBookings }}</span>
                                    <span class="text-gray">Completed Bookings</span>
                                </div>
                            </div>


                            <div class="col-lg-3 col-6 mb25 order-sm-1">
                                <div class="card p-4 rounded-5">
                                    <div class="symbol mb40">
                                        <i class="fa id-color fa-2x fa-calendar-times-o"></i>
                                    </div>
                                    <span class="h1 mb0">{{ $cancelledBookings }}</span>
                                    <span class="text-gray">Cancelled Bookings</span>
                                </div>
                            </div>
                        </div>

                        <div class="card p-4 rounded-5 mb25">
                            <h4>Recent Bookings</h4>

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
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Term</span>
                                        </th>
                                        <th scope="col"><span class="text-uppercase fs-12 text-gray">Status</span></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($recentBookings as $booking)
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

                                            <td><span class="d-lg-none d-sm-block">Term</span>
                                                {{ $booking->number_of_rent_days }}
                                            </td>
                                            <td>
                                                @if($booking->status == 'cancelled')
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
                        {{-- <div class="card p-4 rounded-5">
                            <h4>My Favorites</h4>
                            <div class="spacer-10"></div>
                            <div class="de-item-list no-border mb30">
                                <div class="d-img">
                                    <img src="{{ asset('front-assets/images/cars/jeep-renegade.jpg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Jeep Renegade</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$265</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="de-item-list no-border mb30">
                                <div class="d-img">
                                    <img src="{{ asset('front-assets/images/cars/bmw-m5.jpg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>BMW M2</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$244</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                            <div class="de-item-list no-border mb30">
                                <div class="d-img">
                                    <img src="{{ asset('front-assets/images/cars/ferrari-enzo.jpg') }}" class="img-fluid"
                                        alt="">
                                </div>
                                <div class="d-info">
                                    <div class="d-text">
                                        <h4>Ferarri Enzo</h4>
                                        <div class="d-atr-group">
                                            <ul class="d-atr">
                                                <li><span>Seats:</span>4</li>
                                                <li><span>Luggage:</span>2</li>
                                                <li><span>Doors:</span>4</li>
                                                <li><span>Fuel:</span>Petrol</li>
                                                <li><span>Horsepower:</span>500</li>
                                                <li><span>Engine:</span>3000</li>
                                                <li><span>Drive:</span>4x4</li>
                                                <li><span>Type:</span>Hatchback</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-price">
                                    Daily rate from <span>$167</span>
                                    <a class="btn-main" href="car-single.html">Rent Now</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div> --}}
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection

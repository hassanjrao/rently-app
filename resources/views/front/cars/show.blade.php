@extends('layouts.front')

@section('page-title', $car->name)

@section('content')

    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/2.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Vehicle Fleet</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-car-details">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-6">
                        <div id="slider-carousel" class="owl-carousel">
                            @foreach ($car->images as $image)
                                <div class="item">
                                    <img src='{{ $image->image_url }}' alt="">
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h3>{{ $car->name }}</h3>
                        <p>{{ $car->description }}</p>

                        <div class="spacer-10"></div>

                        <h4>Specifications</h4>
                        <div class="de-spec">
                            <div class="d-row">
                                <span class="d-title">Body</span>
                                <spam class="d-value">
                                    {{ $car->bodyType->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Seat</span>
                                <spam class="d-value">
                                    {{ $car->seat->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Door</span>
                                <spam class="d-value">
                                    {{ $car->doors }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Luggage</span>
                                <spam class="d-value">
                                    {{ $car->luggage }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Fuel Type</span>
                                <spam class="d-value">
                                    {{ $car->fuelType->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Engine</span>
                                <spam class="d-value">
                                    {{ $car->carEngine->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Year</span>
                                <spam class="d-value">
                                    {{ $car->year }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Mileage</span>
                                <spam class="d-value">
                                    {{ $car->mileage }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Transmission</span>
                                <spam class="d-value">
                                    {{ $car->transmission->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Drive</span>
                                <spam class="d-value">
                                    {{ $car->driveType->name }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Fuel Economy</span>
                                <spam class="d-value">
                                    {{ $car->fuel_economy }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Exterior Color</span>
                                <spam class="d-value">
                                    {{ $car->exterior_color }}
                                </spam>
                            </div>
                            <div class="d-row">
                                <span class="d-title">Interior Color</span>
                                <spam class="d-value">
                                    {{ $car->interior_color }}
                                </spam>
                            </div>
                        </div>

                        <div class="spacer-single"></div>

                        <h4>Features</h4>
                        <ul class="ul-style-2">
                            @foreach ($car->features as $feature)
                                <li>{{ $feature->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="col-lg-3">
                        <div class="de-price text-center">
                            Daily rate
                            <h3>
                                {{ config('app.currency_symbol') . $car->daily_rate }}
                            </h3>
                        </div>
                        <div class="spacer-30"></div>
                        <div class="de-box mb25">
                            <form name="contactForm" id='contact_form' method="post">
                                <h4>Book this car</h4>

                                <div class="spacer-20"></div>


                                <a href="{{ route('bookings.quick').'?car='.$car->id }}" class="btn-main btn-fullwidth">Click Here to Book</a>

                                <div class="clearfix"></div>

                            </form>
                        </div>

                        <div class="de-box">
                            <h4>Share</h4>
                            <div class="de-color-icons">
                                <span><i class="fa fa-twitter fa-lg"></i></span>
                                <span><i class="fa fa-facebook fa-lg"></i></span>
                                <span><i class="fa fa-reddit fa-lg"></i></span>
                                <span><i class="fa fa-linkedin fa-lg"></i></span>
                                <span><i class="fa fa-pinterest fa-lg"></i></span>
                                <span><i class="fa fa-stumbleupon fa-lg"></i></span>
                                <span><i class="fa fa-delicious fa-lg"></i></span>
                                <span><i class="fa fa-envelope fa-lg"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>

@endsection

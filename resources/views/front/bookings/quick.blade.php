@extends('layouts.front')

@section('styles')

<style>
    /* add style for readonly */
    input[readonly] {
        background-color: #f8f9fa !important;
    }
</style>

@endsection

@section('page-title', 'Booking')

@section('content')
    <div class="no-bottom" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/16.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Booking</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section" class="no-top" data-bgcolor="#121212">
            <div class="container">
                <div class="row align-items-center">

                    <div class="col-lg-12 mt-80 sm-mt-0">
                        <div class="spacer-single sm-hide"></div>
                        <div class="padding40 rounded-5 shadow-soft" data-bgcolor="#ffffff">

                            @php
                                $bookingCreated = session('bookingCreated');
                            @endphp

                            @if (!$bookingCreated)


                                <form name="contactForm" id='booking_form' class="form-s2 row g-4" method="post"
                                    action="{{ route('bookings.quick.store') }}">
                                    @csrf
                                    <div class="col-lg-6 d-light">
                                        <h4>Booking a Car</h4>
                                        @php

                                            $value = old('car', $car ? $car->id : null);
                                        @endphp
                                        <select name='car' id="vehicle_type" class="form-control" required>

                                            @foreach ($cars as $car)
                                                <option value='{{ $car->id }}'
                                                    {{ $value == $car->id ? 'selected' : '' }}
                                                    data-src="{{ $car->main_image_url }}">
                                                    {{ $car->name }} -
                                                    {{ config('app.currency_symbol') . $car->daily_rate }}
                                                    / day
                                                </option>
                                            @endforeach

                                        </select>

                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <h5>Pick Up Location</h5>
                                                <select name='pick_up_location' id="pick_up_location"
                                                    value="{{ old('pick_up_location') }}" class="form-control opt-1-disable"
                                                    required>
                                                    <option value=''>Enter your pickup location</option>
                                                    @foreach ($locations as $location)
                                                        <option value='{{ $location->id }}'
                                                            {{ old('pick_up_location') == $location->id ? 'selected' : '' }}>
                                                            {{ $location->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Destination</h5>
                                                <select name='destination_location' id="destination"
                                                    class="form-control opt-1-disable" required>
                                                    <option value=''>Enter your destination location</option>
                                                    @foreach ($locations as $location)
                                                        <option value='{{ $location->id }}'
                                                            {{ old('destination_location') == $location->id ? 'selected' : '' }}>
                                                            {{ $location->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Pick Up Date & Time</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker" name="pick_up_date" required
                                                        value="{{ old('pick_up_date') }}">
                                                    <select name="pick_up_time" id="pickup-time" required>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Return Date & Time</h5>
                                                <div class="date-time-field">
                                                    <input type="text" id="date-picker-2" name="return_date" required
                                                        value="{{ old('return_date') }}">
                                                    <select name="return_time" id="collection-time" required>
                                                        <option value="00:00">00:00</option>
                                                        <option value="00:30">00:30</option>
                                                        <option value="01:00">01:00</option>
                                                        <option value="01:30">01:30</option>
                                                        <option value="02:00">02:00</option>
                                                        <option value="02:30">02:30</option>
                                                        <option value="03:00">03:00</option>
                                                        <option value="03:30">03:30</option>
                                                        <option value="04:00">04:00</option>
                                                        <option value="04:30">04:30</option>
                                                        <option value="05:00">05:00</option>
                                                        <option value="05:30">05:30</option>
                                                        <option value="06:00">06:00</option>
                                                        <option value="06:30">06:30</option>
                                                        <option value="07:00">07:00</option>
                                                        <option value="07:30">07:30</option>
                                                        <option value="08:00">08:00</option>
                                                        <option value="08:30">08:30</option>
                                                        <option value="09:00">09:00</option>
                                                        <option value="09:30">09:30</option>
                                                        <option value="10:00">10:00</option>
                                                        <option value="10:30">10:30</option>
                                                        <option value="11:00">11:00</option>
                                                        <option value="11:30">11:30</option>
                                                        <option value="12:00">12:00</option>
                                                        <option value="12:30">12:30</option>
                                                        <option value="13:00">13:00</option>
                                                        <option value="13:30">13:30</option>
                                                        <option value="14:00">14:00</option>
                                                        <option value="14:30">14:30</option>
                                                        <option value="15:00">15:00</option>
                                                        <option value="15:30">15:30</option>
                                                        <option value="16:00">16:00</option>
                                                        <option value="16:30">16:30</option>
                                                        <option value="17:00">17:00</option>
                                                        <option value="17:30">17:30</option>
                                                        <option value="18:00">18:00</option>
                                                        <option value="18:30">18:30</option>
                                                        <option value="19:00">19:00</option>
                                                        <option value="19:30">19:30</option>
                                                        <option value="20:00">20:00</option>
                                                        <option value="20:30">20:30</option>
                                                        <option value="21:00">21:00</option>
                                                        <option value="21:30">21:30</option>
                                                        <option value="22:00">22:00</option>
                                                        <option value="22:30">22:30</option>
                                                        <option value="23:00">23:00</option>
                                                        <option value="23:30">23:30</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- customer details -->

                                    <div class="col-lg-6">
                                        <h4>Enter Your Details</h4>
                                        <div class="row g-4">
                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    @php
                                                        $value = old('name', $user ? $user->name : null);
                                                        $readonly = $user ? 'readonly' : '';
                                                    @endphp
                                                    <input type="text" name="name" id="name"
                                                        class="form-control" value="{{ $value }}"
                                                        {{ $readonly }}
                                                        placeholder="Your Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    @php
                                                        $value = old('email', $user ? $user->email : null);
                                                    @endphp
                                                    <input type="email" name="email" id="email"
                                                        class="form-control" value="{{ $value }}"
                                                        {{ $readonly }}
                                                        placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    @php
                                                        $value = old('phone', $user ? $user->phone : null);
                                                    @endphp
                                                    <input type="tel" name="phone" id="phone"
                                                        class="form-control" value="{{ $value }}"
                                                        {{ $readonly }}
                                                        placeholder="Your Phone" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    <textarea name="message" id="message" class="form-control" placeholder="Do you have any request?">{{ old('message') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="col-lg-3">
                                        <input type='submit' id='send_message' value='Submit'
                                            class="btn-main btn-fullwidth">
                                    </div>


                                </form>
                            @elseif($bookingCreated)
                            {{-- unset session --}}
                            @php
                                session()->forget('bookingCreated');
                            @endphp
                                <div id="success_message" class='success s2' style="display: block !important">
                                    <div class="row">
                                        <div class="col-lg-8 offset-lg-2 text-light text-center">
                                            <h3 class="mb-2">Congratulations! Your booking has been sent successfully. We
                                                will contact you shortly.</h3>
                                            Refresh this page if you want to booking again.
                                            <div class="spacer-20"></div>
                                            <a class="btn-main btn-black" href="{{ route('bookings.quick') }}">Reload
                                                this
                                                page</a>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </div>
                    </div>
                </div>

                <div class="spacer-double"></div>

                <div class="row text-light">
                    <div class="col-lg-12">
                        <div class="container-timeline">
                            <ul>
                                <li>
                                    <h4>Choose a vehicle</h4>
                                    <p>Unlock unparalleled adventures and memorable journeys with our vast fleet of vehicles
                                        tailored to suit every need, taste, and destination.</p>
                                </li>
                                <li>
                                    <h4>Pick location &amp; date</h4>
                                    <p>Pick your ideal location and date, and let us take you on a journey filled with
                                        convenience, flexibility, and unforgettable experiences.</p>
                                </li>
                                <li>
                                    <h4>Make a booking</h4>
                                    <p>Secure your reservation with ease, unlocking a world of possibilities and embarking
                                        on your next adventure with confidence.</p>
                                </li>
                                <li>
                                    <h4>Sit back &amp; relax</h4>
                                    <p>Hassle-free convenience as we take care of every detail, allowing you to unwind and
                                        embrace a journey filled comfort.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section" class="pt40 pb40 text-light bg-color">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list s2">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Truck</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>

                <div class="de-marquee-list s2">
                    <div class="d-item">
                        <span class="d-item-txt">SUV</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Hatchback</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Crossover</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Convertible</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sedan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Sports Car</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Coupe</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivan</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Station Wagon</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Truck</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Minivans</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                        <span class="d-item-txt">Exotic Cars</span>
                        <span class="d-item-display">
                            <i class="d-item-dot"></i>
                        </span>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

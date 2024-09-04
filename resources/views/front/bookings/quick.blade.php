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

                                            $selectedCar = $car ? $car : null;
                                            if (!$selectedCar) {
                                                $selectedCar = $cars->first();
                                            }
                                        @endphp
                                        <select name='car' id="vehicle_type" class="form-control" required
                                            onchange="setDailyRate(this)">

                                            @foreach ($cars as $car)
                                                <option value='{{ $car->id }}'
                                                    {{ $value == $car->id ? 'selected' : '' }}
                                                    data-dailyrate="{{ $car->daily_rate }}"
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
                                                    <input type="datetime-local" class="form-control" id="datePickerPick"
                                                        name="pick_up_date" required value="{{ old('pick_up_date') }}"
                                                        onchange="pickupDateSelected(this)">

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Return Date & Time</h5>
                                                <div class="date-time-field">
                                                    <input type="datetime-local" class="form-control" id="datePickerReturn"
                                                        name="return_date" required value="{{ old('return_date') }}"
                                                        onchange="calculateTotal()">

                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h4>Your Total</h4>
                                                <h5 id="total">Total:
                                                    {{ config('app.currency_symbol') . $selectedCar->daily_rate }}
                                                </h5>
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
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        value="{{ $value }}" {{ $readonly }}
                                                        placeholder="Your Name" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    @php
                                                        $value = old('email', $user ? $user->email : null);
                                                    @endphp
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{ $value }}" {{ $readonly }}
                                                        placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="field-set">
                                                    @php
                                                        $value = old('phone', $user ? $user->phone : null);
                                                    @endphp
                                                    <input type="tel" name="phone" id="phone" class="form-control"
                                                        value="{{ $value }}" {{ $readonly }}
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

@push('scripts')
    <script>
        var dailyRate = {{ $selectedCar->daily_rate ?? 0 }};

        console.log('dailyRate', dailyRate);

        function setDailyRate(el) {
            var selectedOption = el.options[el.selectedIndex];
            dailyRate = selectedOption.getAttribute('data-dailyrate');
            $('#total').text('Total: ' + dailyRate + ' {{ config('app.currency_symbol') }}');
        }

        function pickupDateSelected(el) {
            var selectedDate = el.value;

            // disable the dates of return date which are less than and equal to pick up date

            let returnDateInput = document.getElementById('datePickerReturn');

            let moreThanPickUpDate = new Date(selectedDate);
            moreThanPickUpDate.setDate(moreThanPickUpDate.getDate() + 2);

            returnDateInput.min = moreThanPickUpDate.toISOString().slice(0, 16);


            // set return date to pick up date + 1 day
            var startDate = new Date(selectedDate);
            startDate.setDate(startDate.getDate() + 1);

            var formattedDate = startDate.toISOString().slice(0, 16);

            document.getElementById('datePickerReturn').value = formattedDate;

            calculateTotal();
        }

        function calculateTotal() {
            var pickUpDate = $('#datePickerPick').val();

            // show error if pickupdate is less than today
            var today = new Date();
            var selectedDate = new Date(pickUpDate);

            // disable the dates of return date which are less than pick up date

            let returnDateInput = document.getElementById('datePickerReturn');
            returnDateInput.min = pickUpDate;



            var returnDate = $('#datePickerReturn').val();

            // calculate total according to number of days * daily rate

            var startDate = new Date(pickUpDate);
            var endDate = new Date(returnDate);

            var diff = endDate - startDate;

            var days = diff / (1000 * 60 * 60 * 24);

            if (days == 0) {
                days = 1;
            }

            var total = days * dailyRate;

            // round to 2 decimal places
            total = total.toFixed(2);

            $('#total').text(total + ' {{ config('app.currency_symbol') }}');
        }


        setDatePickers();

        function setDatePickers() {

            const now = new Date();

            // Format the date and time as YYYY-MM-DDTHH:MM (required for datetime-local)
            const formattedDateTime = now.toISOString().slice(0, 16);


             // Set the min attribute to the current date and time
            document.getElementById('datePickerPick').min = formattedDateTime;
            document.getElementById('datePickerReturn').min = formattedDateTime;

            // set current date and time
            document.getElementById('datePickerPick').value = formattedDateTime;
            // set plus 1 day
            now.setDate(now.getDate() + 1);
            document.getElementById('datePickerReturn').value = now.toISOString().slice(0, 16);

        }
    </script>
@endpush

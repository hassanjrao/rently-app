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
                                    {{-- multitype --}} enctype="multipart/form-data"
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
                                                <h4>Subtotal (excluding taxes and fees):</h4>
                                                <h5 id="total">
                                                    {{ config('app.currency_symbol') . $selectedCar->daily_rate }}
                                                </h5>
                                            </div>

                                        </div>

                                    </div>

                                    <!-- customer details -->

                                    <div class="col-lg-6">
                                        <h4>Enter Your Details</h4>
                                        <div class="row g-4">
                                            <div class="col-lg-6">
                                                <h5>Name</h5>
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
                                            <div class="col-lg-6">
                                                <h5>Email</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old('email', $user ? $user->email : null);
                                                    @endphp
                                                    <input type="email" name="email" id="email" class="form-control"
                                                        value="{{ $value }}" {{ $readonly }}
                                                        placeholder="Your Email" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5>Phone</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old('phone', $user ? $user->phone : null);
                                                    @endphp
                                                    <input type="tel" name="phone" id="phone" class="form-control"
                                                        value="{{ $value }}" {{ $readonly }}
                                                        placeholder="Your Phone" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Address</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old('address', $user ? $user->address : null);
                                                    @endphp
                                                    <input type="text" name="address" id="address"
                                                        class="form-control" value="{{ $value }}"
                                                        placeholder="Your Address" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Date of Birth</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'date_of_birth',
                                                            $user ? $user->date_of_birth : null,
                                                        );
                                                    @endphp
                                                    <input type="date" name="date_of_birth" id="date_of_birth"
                                                        class="form-control" value="{{ $value }}"
                                                        placeholder="Your Date of Birth" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>License Number</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'driver_license_number',
                                                            $user ? $user->driver_license_number : null,
                                                        );
                                                    @endphp
                                                    <input type="text" name="driver_license_number"
                                                        id="driver_license_number" class="form-control"
                                                        value="{{ $value }}"
                                                        placeholder="Your Driver License Number" required>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <h5>License State</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'driver_license_state',
                                                            $user ? $user->driver_license_state : null,
                                                        );
                                                    @endphp
                                                    <input type="text" name="driver_license_state"
                                                        id="driver_license_state" class="form-control"
                                                        value="{{ $value }}"
                                                        placeholder="Your Driver License State" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>License Front Image</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'driver_license_front_image',
                                                            $user ? $user->driver_license_front_image : null,
                                                        );
                                                    @endphp
                                                    <input type="file" name="driver_license_front_image"
                                                        id="driver_license_front_image" class="form-control"
                                                        value="{{ $value }}" accept="image/*"
                                                        placeholder="Your Driver License State" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>License Back Image</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'driver_license_back_image',
                                                            $user ? $user->driver_license_back_image : null,
                                                        );
                                                    @endphp
                                                    <input type="file" name="driver_license_back_image"
                                                        id="driver_license_front_image" class="form-control"
                                                        value="{{ $value }}" accept="image/*"
                                                        placeholder="Your Driver License State" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <h5>Proof of Income</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old(
                                                            'proof_of_income',
                                                            $user ? $user->proof_of_income : null,
                                                        );
                                                    @endphp
                                                    <input type="file" name="proof_of_income" id="proof_of_income"
                                                        class="form-control" placeholder="Your Driver License State"
                                                        required>
                                                </div>
                                            </div>


                                            <div class="col-lg-6">
                                                <h5>How did you hear about us?</h5>
                                                <div class="field-set">
                                                    @php
                                                        $value = old('lead_from', $user ? $user->lead_from : null);
                                                    @endphp
                                                    <input type="text" name="lead_from" id="lead_from"
                                                        class="form-control" value="{{ $value }}"
                                                        placeholder="How did you hear about us?">
                                                </div>
                                            </div>



                                            <div class="col-lg-6">
                                                <h5>Request</h5>
                                                <div class="field-set">
                                                    <textarea name="message" id="message" class="form-control" placeholder="Do you have any request?">{{ old('message') }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                    </div>



                                    <div class="row justify-content-between">
                                        <div class="col-lg-12 mb-4 mt-4">
                                            {{-- agreement checkbox --}}
                                            <div class="de_form">

                                                <div class="de_checkbox">
                                                    <input required id="agree" name="agree" type="checkbox">
                                                    <label for="agree">
                                                        *By entering your phone number you agree to be contacted via SMS for
                                                        information, offers, and
                                                        advertsing. We will NEVER spam you and you can opt-out of out
                                                        messages
                                                        at anytime. Message
                                                        & data rates apply. Message frequency varies. I have read and agree
                                                        to
                                                        the Terms and
                                                        Conditions, Consent to Electronic Communications and the Company
                                                        Privacy
                                                        Notice.
                                                    </label>
                                                </div>

                                            </div>


                                        </div>
                                        <div class="col-lg-3">
                                            <input type='submit' id='send_message' value='Submit'
                                                class="btn-main btn-fullwidth">
                                        </div>
                                    </div>
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
                <div class="col-lg-12" style="margin-left: 1.4rem">
                    <div class="container-timeline">
                        <ul>
                            <li>
                                <h4>Find Your Perfect Ride.</h4>
                                <p>From sleek sedans to spacious SUVs, we've got the ride that fits your lifestyle.</p>
                            </li>
                            <li>
                                <h4>Plan Your Journey.</h4>
                                <p>Pick up your ride from one of our convenient loca-ons or enjoy the convenience of our delivery
                                    service within our designated area.</p>
                            </li>
                            <li>
                                <h4>Easy Booking, Fast Approval.</h4>
                                <p>Submit your booking with a few simple steps. Our team will review your informa-on swiOly,
                                    ensuring you're on the road in no -me.</p>
                            </li>
                            <li>
                                <h4>Hit the Road in Style.</h4>
                                <p>Once approved, we'll work diligently to have your vehicle ready for pickup or delivery as soon as
                                    possible. Sit back, relax, and get ready for an unforgeFable journey.</p>
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
                    <span class="d-item-txt">Rentals Starting As Low As $375 A Week</span>
                    <span class="d-item-display">
                        <i class="d-item-dot"></i>
                    </span>

                    <span class="d-item-txt">Rentals Starting As Low As $375 A Week</span>
                    <span class="d-item-display">
                        <i class="d-item-dot"></i>
                    </span>
                </div>
            </div>

            <div class="de-marquee-list s2">
                <div class="d-item">
                    <span class="d-item-txt">Rentals Starting As Low As $375 A Week</span>
                    <span class="d-item-display">
                        <i class="d-item-dot"></i>
                    </span>

                    <span class="d-item-txt">Rentals Starting As Low As $375 A Week</span>
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
            $('#total').text( dailyRate + ' {{ config('app.currency_symbol') }}');
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

@extends('layouts.front')

@section('page-title', 'Home')
@php
    // check if in cache settings exists otherwise query Settings and store in cache
    $settings = Cache::remember('settings', 60 * 60 * 24, function () {
        return \App\Models\Setting::first();
    });
@endphp

@section('content')
    <!-- Hero -->
    <div class="no-bottom" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax">
            <img src="{{ asset('front-assets/images/background/1.jpg') }}" class="jarallax-img" alt="">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12 text-light">
                        <div class="spacer-double"></div>
                        <div class="spacer-double"></div>
                        <h1 class="mb-2">Ready to
                            <span class="id-color">ride a while</span>? You're at the
                            right place.
                        </h1>
                        <div class="spacer-single"></div>
                    </div>

                    <div class="col-lg-12">
                        <div class="spacer-single sm-hide"></div>
                        <div class="p-4 rounded-3 shadow-soft" data-bgcolor="#ffffff">


                            <form name="contactForm" action="{{ route('cars.index') }}" method="get" id='contact_form'>


                                <div id="step-1" class="row">
                                    <div class="col-lg-6 mb30">
                                        <h5>What is your vehicle type?</h5>

                                        <div class="de_form de_radio row g-3">

                                            @foreach ($vehicleTypes as $type)
                                                <div class="radio-img col-lg-3 col-sm-3 col-6">
                                                    <input id="radio-vh{{ $type->id }}" name="vehicle_types"
                                                        type="radio" value="{{ $type->id }}" checked="checked">
                                                    <label for="radio-vh{{ $type->id }}"><img
                                                            src="{{ asset('front-assets/images/select-form/car.png') }}"
                                                            alt="">
                                                        <span>{{ $type->name }}</span>
                                                    </label>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="row">
                                            <div class="col-lg-6 mb20">
                                                <h5>Body Type</h5>
                                                <select name="body_types" id="body_types" class="form-select">
                                                    <option selected disabled value="">Select Body type</option>
                                                    @foreach ($bodyTypes as $type)
                                                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Seats</h5>
                                                <select name="seats" id="seats" class="form-select">
                                                    <option selected disabled value="">Select Seats</option>
                                                    @foreach ($seats as $seat)
                                                        <option value="{{ $seat->id }}">{{ $seat->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6 mb20">
                                                <h5>Engine</h5>
                                                <select name="engines" id="engine" class="form-select">
                                                    <option selected disabled value="">Select Engine</option>
                                                    @foreach ($carEngines as $engine)
                                                        <option value="{{ $engine->id }}">{{ $engine->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-lg-6 mt20" style="margin-top: 41px">
                                                <input type='submit' id='send_message' value='Find a Vehicle'
                                                    class="btn-main pull-right">
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>

                    <div class="spacer-double"></div>

                    <div class="row">
                        <div class="col-lg-12 text-light">
                            <div class="container-timeline">
                                <ul>
                                    <li>
                                        <h4>Find Your Perfect Ride</h4>
                                        <p>From sleek sedans to spacious SUVs, we've got the ride that fits your lifestyle.
                                        </p>
                                    </li>
                                    <li>
                                        <h4>Plan Your Journey.</h4>
                                        <p>Pick up your ride from one of our convenient locations or enjoy the convenience
                                            of our delivery
                                            service within our designated area.</p>
                                    </li>
                                    <li>
                                        <h4>Easy Booking, Fast Approval. </h4>
                                        <p>Submit your booking with a few simple steps. Our team will review your
                                            information swiftly,
                                            ensuring you're on the road in no timme.
                                        </p>
                                    </li>
                                    <li>
                                        <h4>Hit the Road in Style.</h4>
                                        <p>Once approved, we'll work diligently to have your vehicle ready for pickup or delivery as soon as
                                            possible. Sit back, relax, and get ready for an unforgehable journey.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section aria-label="section" class="pt40 pb40 text-light" data-bgcolor="#111111">
            <div class="wow fadeInRight d-flex">
                <div class="de-marquee-list">
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

                <div class="de-marquee-list">
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


        <section id="section-cars">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 offset-lg-3 text-center">
                        <h2>Our Vehicle Fleet</h2>
                        <p>Driving your dreams to reality with an exquisite fleet of versatile vehicles for
                            unforgettable journeys.</p>
                        <div class="spacer-20"></div>
                    </div>

                    <div id="items-carousel" class="owl-carousel wow fadeIn">

                        @foreach ($cars as $car)
                            <div class="col-lg-12">
                                <x-car :car="$car" />
                            </div>
                        @endforeach

                    </div>

                </div>
            </div>
        </section>




        <section class="text-light jarallax" aria-label="section">
            <img src="{{ asset('front-assets/images/background/3.jpg') }}" alt="" class="jarallax-img">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <h1>Let's Your Adventure Begin</h1>
                        <div class="spacer-20"></div>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-trophy de-icon mb20"></i>
                        <h4>First Class Services</h4>
                        <p>Where luxury meets exceptional care, creating unforgettable moments and exceeding your
                            every expectation.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-road de-icon mb20"></i>
                        <h4>24/7 road assistance</h4>
                        <p>Reliable support when you need it most, keeping you on the move with confidence and peace
                            of mind.</p>
                    </div>
                    <div class="col-md-3">
                        <i class="fa fa-map-pin de-icon mb20"></i>
                        <h4>Free Pick-Up & Drop-Off</h4>
                        <p>Enjoy free pickup and drop-off services, adding an extra layer of ease to your car rental
                            experience.</p>
                    </div>
                </div>
            </div>
        </section>


        <section id="section-faq">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Have Any Questions?</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
                <div class="row g-custom-x">
                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">
                                @foreach ($firstColumnFaqs as $faq)
                                    <div class="accordion-section-title" data-tab="#accordion-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </div>
                                    <div class="accordion-section-content" id="accordion-{{ $faq->id }}">
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 wow fadeInUp">
                        <div class="accordion secondary">
                            <div class="accordion-section">

                                @foreach ($secondColumnFaqs as $faq)
                                    <div class="accordion-section-title" data-tab="#accordion-{{ $faq->id }}">
                                        {{ $faq->question }}
                                    </div>
                                    <div class="accordion-section-content" id="accordion-{{ $faq->id }}">
                                        <p>
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section id="section-testimonials" class="no-top no-bottom">
            <div class="container-fluid">
                <div class="row g-2 p-2 align-items-center">

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    I have been using Rentaly for my Car Rental needs for over 5 years now. I have
                                    never had any problems with their service. Their customer support is always
                                    responsive and helpful. I would recommend Rentaly to anyone looking for a
                                    reliable Car Rental provider.
                                    <span class="by">Stepanie Hutchkiss</span>
                                </blockquote>
                            </div>
                            <img src="{{ asset('front-assets/images/testimonial/1.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    We have been using Rentaly for our trips needs for several years now and have
                                    always been happy with their service. Their customer support is Excellent
                                    Service! and they are always available to help with any issues we have. Their
                                    prices are also very competitive.
                                    <span class="by">Jovan Reels</span>
                                </blockquote>
                            </div>
                            <img src="{{ asset('front-assets/images/testimonial/2.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="de-image-text">
                            <div class="d-text">
                                <div class="d-quote id-color"><i class="fa fa-quote-right"></i></div>
                                <h4>Excellent Service! Car Rent Service!</h4>
                                <blockquote>
                                    Endorsed by industry experts, Rentaly is the Car Rental solution you can trust.
                                    With years of experience in the field, we provide fast, reliable and secure Car
                                    Rental services.
                                    <span class="by">Kanesha Keyton</span>
                                </blockquote>
                            </div>
                            <img src="{{ asset('front-assets/images/testimonial/3.jpg') }}" class="img-fluid"
                                alt="">
                        </div>
                    </div>

                </div>
            </div>
        </section>



        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h2>Contact Us</h2>
                        <div class="spacer-20"></div>
                    </div>
                </div>
                <div class="row  d-flex justify-content-center">

                    <div class="col-lg-8 mb-sm-30">


                        <form id="contact_form" class="form-border" method="post" action="{{ route('contact-us.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Your Name" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="email" name="email" id="email" class="form-control"
                                            placeholder="Your Email" required>
                                    </div>
                                </div>
                                <div class="col-md-4 mb10">
                                    <div class="field-set">
                                        <input type="tel" name="phone" id="phone" class="form-control"
                                            placeholder="Your Phone" required>
                                    </div>
                                </div>
                            </div>

                            <div class="field-set mb20">
                                <textarea name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
                            </div>
                            {{-- <div class="g-recaptcha" data-sitekey="copy-your-site-key-here"></div> --}}
                            <div id='submit' class="mt20 d-flex justify-content-center w-100">
                                <input type='submit' id='send_message' value='Send Message' class="btn-main">
                            </div>

                            <div id="success_message" class='success'>
                                Your message has been sent successfully. Refresh this page if you want to send more
                                messages.
                            </div>
                            <div id="error_message" class='error'>
                                Sorry there was an error sending your form.
                            </div>
                        </form>
                    </div>


                </div>
            </div>

        </section>



    </div>
    <!-- END Hero -->
@endsection

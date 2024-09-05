@extends('layouts.front')

@section('page-title', 'About Us')

@section('content')


@php
    // check if in cache settings exists otherwise query Settings and store in cache
    $settings = Cache::remember('settings', 60 * 60 * 24, function () {
        return \App\Models\Setting::first();
    });
@endphp

<div class="no-bottom zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="{{  asset('front-assets/images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>About Us</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->

    <section>
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInRight">
                    <h2>We offer customers a wide  <span class="id-color">range of vehicles</span> to get you where you  <span class="id-color">need to go.</span>
                    </h2>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-delay=".25s">
                    <p>
                        At Ride A While, we understand that your time is valuable. That's why we've designed our rental car services to seamlessly integrate into your busy lifestyle. As a working professional, you need a reliable and comfortable vehicle to get you where you need to go.
                    </p>
                    <p>
                        Our fleet is meticulously maintained to ensure a smooth and enjoyable driving experience. Whether you're commuting daily, traveling for business, or exploring the city, we have the perfect vehicle to suit your needs.
                    </p>
                </div>
            </div>

        </div>
    </section>



    <section id="section-img-with-tab">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-lg-5">

                    <h2>Only Quality For Clients to We Offer Fast Approvals To Get You On The Road.</h2>
                    <div class="spacer-20"></div>

                   <ul>
                    <li>With our efficient rental process, you can get on the road quickly and start focusing on what matters most. Our friendly staff is always available to assist you and answer any questions you may have.</li>
                    <li> Our commitment to you. We believe that renting a car should be a hassle-free experience. That's why we offer a quick and efficient rental process, so you can get on the road faster. Our 24/7 customer support team is always available to assist you, ensuring you have a seamless rental journey.</li>
                    <li>As a reward for our loyal customers, qualified long-term renters with a positive payment history may have the opportunity to purchase their rental vehicle. We offer flexible purchase options including financing, cash, or buy-here-pay-here programs.</li>
                    <li>So, why choose Ride A While? Because we're more than just a rental car company. We're your partner in success, providing the transportation you need to achieve your goals.</li>
                   </ul>

                </div>
                <div class="col-lg-7">
                    <img src="{{ asset('front-assets/images/background/5.jpg') }}" alt="about us" class="img-fluid" style="width: 100%">
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

@endsection

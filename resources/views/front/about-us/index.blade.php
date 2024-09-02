@extends('layouts.front')

@section('page-title', 'About Us')

@section('content')


@php
    // check if in cache settings exists otherwise query Settings and store in cache
    $settings = Cache::remember('settings', 60 * 60 * 24, function () {
        return \App\Models\Setting::first();
    });
@endphp

<div class="no-bottom no-top zebra" id="content">
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
                    <h2>We offer customers a wide range of <span class="id-color">commercial cars</span> and <span class="id-color">luxury cars</span> for any occasion.</h2>
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
            <div class="spacer-double"></div>
            <div class="row text-center">
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15425" data-speed="3000">0</h3>
                        Completed Orders
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="8745" data-speed="3000">0</h3>
                        Happy Customers
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="235" data-speed="3000">0</h3>
                        Vehicles Fleet
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 mb-sm-30">
                    <div class="de_count wow fadeInUp" data-bgcolor="#f5f5f5">
                        <h3 class="timer" data-to="15" data-speed="3000">0</h3>
                        Years Experience
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section id="section-img-with-tab">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 offset-lg-7">

                    <h2>Only Quality For Clients</h2>
                    <div class="spacer-20"></div>

                   <ul>
                    <li>With our efficient rental process, you can get on the road quickly and start focusing on what matters most. Our friendly staff is always available to assist you and answer any questions you may have.</li>
                    <li> Our commitment to you. We believe that renting a car should be a hassle-free experience. That's why we offer a quick and efficient rental process, so you can get on the road faster. Our 24/7 customer support team is always available to assist you, ensuring you have a seamless rental journey.</li>
                    <li>As a reward for our loyal customers, qualified long-term renters with a positive payment history may have the opportunity to purchase their rental vehicle. We offer flexible purchase options including financing, cash, or buy-here-pay-here programs.</li>
                    <li>So, why choose Ride A While? Because we're more than just a rental car company. We're your partner in success, providing the transportation you need to achieve your goals.</li>
                   </ul>

                </div>
            </div>
        </div>

        <div class="image-container col-md-6 pull-right" data-bgimage="url({{  asset('front-assets/images/background/5.jpg')}}) center"></div>
    </section>

    <section id="section-call-to-action" class="bg-color-2 pt60 pb60 text-light">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h2 class="s2">Call us for further information. {{ config('app.name') }} customer care is here to help you anytime.</h2>
                </div>

                <div class="col-lg-4 text-lg-center text-sm-center">
                    <div class="phone-num-big">
                        <i class="fa fa-phone"></i>
                        <span class="pnb-text">
                            Call Us Now
                        </span>
                        <span class="pnb-num">
                            {{ $settings->phone }}
                        </span>
                    </div>
                    <a href="{{ route('contact-us.index') }}" class="btn-main">Contact Us</a>
                </div>
            </div>
        </div>
    </section>

</div>

@endsection

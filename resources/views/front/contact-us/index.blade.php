@extends('layouts.front')

@section('page-title', 'Contact Us')

@section('content')

@php
    // check if in cache settings exists otherwise query Settings and store in cache
    $settings = Cache::remember('settings', 60 * 60 * 24, function () {
        return \App\Models\Setting::first();
    });
@endphp

<div class="no-bottom no-top" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="{{  asset('front-assets/images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->


    <section aria-label="section">
        <div class="container">
                <div class="row g-custom-x">

                    <div class="col-lg-8 mb-sm-30">

                     <h3>Do you have any question?</h3>

                        <form id="contact_form" class="form-border" method="post" action="{{ route('contact-us.store') }}">
                            @csrf
                                <div class="row">
                                    <div class="col-md-4 mb10">
                                        <div class="field-set">
                                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb10">
                                        <div class="field-set">
                                            <input type="email" name="email" id="email" class="form-control" placeholder="Your Email" required>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb10">
                                        <div class="field-set">
                                            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Your Phone" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="field-set mb20">
                                    <textarea name="message" id="message" class="form-control" placeholder="Your Message" required></textarea>
                                </div>
                                {{-- <div class="g-recaptcha" data-sitekey="copy-your-site-key-here"></div> --}}
                                <div id='submit' class="mt20">
                                    <input type='submit' id='send_message' value='Send Message' class="btn-main">
                                </div>

                                <div id="success_message" class='success'>
                                    Your message has been sent successfully. Refresh this page if you want to send more messages.
                                </div>
                                <div id="error_message" class='error'>
                                    Sorry there was an error sending your form.
                                </div>
                            </form>
                </div>

                <div class="col-lg-4">

                    <div class="de-box mb30">
                        <address class="s1">
                            <span><i class="id-color fa fa-map-marker fa-lg"></i>
                                {{ $settings->address }}
                            </span>
                            <span><i class="id-color fa fa-phone fa-lg"></i>
                                <a href="tel:{{ $settings->phone }}">{{ $settings->phone }}</a>
                            </span>
                            <span><i class="id-color fa fa-envelope-o fa-lg"></i><a href="mailto:{{ $settings->email }}">{{ $settings->email }}</a></span>
                            
                        </address>
                    </div>




                </div>

                </div>
            </div>

    </section>

</div>

@endsection

@extends('layouts.front')

@section('page-title', 'Register')

@section('content')

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <section id="section-hero" aria-label="section" class="jarallax">
            <img src="{{ asset('front-assets/images/background/2.jpg') }}" class="jarallax-img" alt="">
            <div class="v-center">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-4 offset-lg-4">
                            <div class="padding40 rounded-3 shadow-soft" data-bgcolor="#ffffff">
                                <h4>Register</h4>
                                <div class="spacer-10"></div>
                                <form method="POST" class="form-border" action="{{ route('register') }}">
                                    @csrf

                                    <div class="field-set mb-4">
                                        <input type="text" name="name" id="name"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" placeholder="Your name" />
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="field-set mb-4">
                                        <input type="text" name="email" id="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" placeholder="Your Email" />
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="field-set mb-4">
                                        <input type="password" name="password" id="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Your Password" />
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="field-set mb-4">
                                        <input type="password" name="password_confirmation" id="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            placeholder="Confirm Password" />
                                    </div>
                                    <div id="submit">
                                        <input type="submit" id="send_message" value="Sign Up"
                                            class="btn-main btn-fullwidth rounded-3" />
                                   
                                    </div>
                                </form>
                                <div class="text-center w-100 mt-3">
                                    Already have an account? <a href="{{ route('login') }}">Sign In</a>
                                </div>
                                {{-- <div class="title-line">Or&nbsp;sign&nbsp;up&nbsp;with</div>
                            <div class="row g-2">
                                <div class="col-lg-6">
                                    <a class="btn-sc btn-fullwidth mb10" href="#"><img
                                            src="{{  asset('front-assets/images/svg/google_icon.svg')}}" alt="">Google</a>
                                </div>
                                <div class="col-lg-6">
                                    <a class="btn-sc btn-fullwidth mb10" href="#"><img
                                            src="{{  asset('front-assets/images/svg/facebook_icon.svg')}}" alt="">Facebook</a>
                                </div>
                            </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

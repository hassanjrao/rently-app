@extends('layouts.front')

@section('page-title', 'Profile')

@section('content')
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/14.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>My Profile</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-settings" class="bg-gray-100">
            <div class="container">
                <div class="row">
                    <x-profile-sidebar />

                    <div class="col-lg-9">
                        <div class="card p-4  rounded-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <form id="form-create-item" class="form-border" method="post" action="email.php">
                                        <div class="de_tab tab_simple">

                                            <ul class="de_nav">
                                                <li class="active"><span>Profile</span></li>

                                            </ul>

                                            <div class="de_tab_content">
                                                <div class="tab-1">
                                                    <div class="row">
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Name</h5>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                value="{{ auth()->user()->name }}" placeholder="Enter Name"
                                                                required />
                                                            @error('name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Email Address</h5>
                                                            <input type="email" name="email" id="email"
                                                                value="{{ auth()->user()->email }}"
                                                                class="form-control @error('name') is-invalid @enderror"
                                                                placeholder="Enter email" required />
                                                            @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>New Password</h5>
                                                            <input type="Password" name="password" id="password"
                                                                class="form-control" placeholder="********" required />
                                                            @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-lg-6 mb20">
                                                            <h5>Re-enter Password</h5>
                                                            <input type="Password" name="password_re-enter"
                                                                id="password_re-enter" class="form-control"
                                                                placeholder="********" required />
                                                        </div>
                                                        {{-- <div class="col-md-6 mb20">
                                                    <h5>Language</h5>
                                                    <p class="p-info">Select your prefered language.</p>
                                                    <div id="select_lang" class="dropdown fullwidth">
                                                        <a href="#" class="btn-selector">English</a>
                                                        <ul>
                                                            <li class="active"><span>English</span></li>
                                                            <li><span>France</span></li>
                                                            <li><span>German</span></li>
                                                            <li><span>Japan</span></li>
                                                            <li><span>Italy</span></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb20">
                                                    <h5>Hour Format</h5>
                                                    <p class="p-info">Select your prefered language.</p>
                                                    <div id="select_hour_format" class="dropdown fullwidth">
                                                        <a href="#" class="btn-selector">24-hour</a>
                                                        <ul>
                                                            <li class="active"><span>24-hour</span></li>
                                                            <li><span>12-hour</span></li>
                                                        </ul>
                                                    </div>
                                                </div> --}}
                                                    </div>
                                                </div>


                                            </div>
                                        </div>

                                        <input type="button" id="submit" class="btn-main" value="Update profile">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

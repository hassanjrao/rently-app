<!DOCTYPE html>
<html lang="zxx">

<head>
    <title>@yield('page-title') - {{ config('app.name') }}</title>
    <link rel="icon" href="{{ asset('front-assets/images/logo.png') }}" type="image/gif" sizes="16x16">
    <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- CSS Files
    ================================================== -->
    <link href="{{ asset('front-assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" id="bootstrap">
    <link href="{{ asset('front-assets/css/mdb.min.css') }}" rel="stylesheet" type="text/css" id="mdb">
    <link href="{{ asset('front-assets/css/plugins.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-assets/css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('front-assets/css/coloring.css') }}" rel="stylesheet" type="text/css">
    <!-- color scheme -->
    <link id="colors" href="{{ asset('front-assets/css/colors/scheme-01.css') }}" rel="stylesheet" type="text/css">

    @yield('styles')

</head>

@php
    // check if in cache settings exists otherwise query Settings and store in cache
    $settings = Cache::remember('settings', 60 * 60 * 24, function () {
        return \App\Models\Setting::first();
    });
@endphp

<body>
    <div id="wrapper">

        <!-- page preloader begin -->
        {{-- <div id="de-preloader"></div> --}}
        <!-- page preloader close -->

        <!-- header begin -->
        <header class="scroll-light has-topbar" style="background: white; color:#333333">
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">
                            <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>
                                    {{ $settings->phone }}
                                </a>
                            </div>
                            <div class="topbar-widget"><a  href="mailto:{{ $settings->email }}"><i class="fa fa-envelope"></i>
                                    {{ $settings->email }}
                                </a></div>
                            <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>
                                    {{ $settings->timings }}
                                </a></div>
                        </div>
                    </div>

                    <div class="topbar-right">
                        <div class="social-icons">
                            @if ($settings->facebook)
                                <a href="{{ $settings->facebook }}">
                                    <i class="fa fa-facebook fa-lg"></i>
                                </a>
                            @endif
                            @if ($settings->twitter)
                                <a href="{{ $settings->twitter }}">
                                    <i class="fa fa-twitter fa-lg"></i>
                                </a>
                            @endif
                            @if ($settings->instagram)
                                <a href="{{ $settings->instagram }}">
                                    <i class="fa fa-instagram fa-lg"></i>
                                </a>
                            @endif

                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="de-flex sm-pt10">
                            <div class="de-flex-col">
                                <div class="de-flex-col">
                                    <!-- logo begin -->
                                    <div id="logo">
                                        <a href="{{ route('home') }}">
                                            <img class="logo-1" src="{{ asset('front-assets/images/logo-light.png') }}"
                                                style="width: 100px" alt="">
                                            <img class="logo-2" src="{{ asset('front-assets/images/logo-light.png') }}"
                                                style="width: 100px" alt="">
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="menu-item {{ request()->is('/') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('cars*') ? 'active' : '' }}"
                                            href="{{ route('cars.index') }}">Cars</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('bookings/quick') ? 'active' : '' }}"
                                            href="{{ route('bookings.quick') }}">Quick Booking</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('about-us') ? 'active' : '' }}"
                                            href="{{ route('about-us') }}">About Us</a></li>
                                    <li><a class="menu-item {{ request()->is('contact-us') ? 'active' : '' }}"
                                            href="{{ route('contact-us.index') }}">Contact Us</a></li>

                                    <li><a class="menu-item {{ request()->is('news*') ? 'active' : '' }}"
                                            href="{{ route('news.index') }}">News</a>

                                    </li>

                                </ul>
                            </div>
                            <div class="de-flex-col">
                                <div class="menu_side_area">
                                    @auth
                                        <a href="{{ route('profile.dashboard') }}" class="btn-main">Profile</a>

                                    @endauth
                                    @guest
                                        <a href="{{ route('register') }}" class="btn-main">Sign Up</a>
                                        <a href="{{ route('login') }}" class="btn-main">Sign In</a>
                                    @endguest

                                    <span id="menu-btn"></span>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- header close -->
        <!-- content begin -->
        <div id="vue-app">
            @yield('content')
        </div>
        <!-- content close -->
        <a href="#" id="back-to-top"></a>
        <!-- footer begin -->
        <footer class="text-light">
            <div class="container">
                <div class="row g-custom-x">
                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>About {{ config('app.name') }}</h5>
                            <p>
                                {{ $settings->about }}
                            </p>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Contact Info</h5>
                            <address class="s1">
                                <span><i class="id-color fa fa-map-marker fa-lg"></i>
                                    {{ $settings->address }}
                                </span>
                                <span><i class="id-color fa fa-phone fa-lg"></i>
                                    {{ $settings->phone }}
                                </span>
                                <span><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:{{ $settings->email }}">{{ $settings->email }}</a>
                                </span>

                            </address>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <h5>Quick Links</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="widget">
                                    <ul>
                                        <li><a href="{{ route('cars.index') }}">Cars</a></li>
                                        <li><a href="{{ route('bookings.quick') }}">Quick Booking</a></li>
                                        <li><a href="{{ route('news.index') }}">News</a></li>
                                        <li><a href="{{ route('contact-us.index') }}">Contact Us</a></li>
                                        <li><a href="{{ route('about-us') }}">About</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Social Network</h5>
                            <div class="social-icons">
                                @if ($settings->facebook)
                                    <a href="{{ $settings->facebook }}">
                                        <i class="fa fa-facebook fa-lg"></i>
                                    </a>
                                @endif
                                @if ($settings->twitter)
                                    <a href="{{ $settings->twitter }}">
                                        <i class="fa fa-twitter fa-lg"></i>
                                    </a>
                                @endif

                                @if ($settings->instagram)
                                    <a href="{{ $settings->instagram }}">
                                        <i class="fa fa-instagram fa-lg"></i>
                                    </a>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="subfooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="de-flex">
                                <div class="de-flex-col">
                                    <a href="{{ route('home') }}">
                                        Copyright &copy;
                                        {{ date('Y') }} {{ config('app.name') }}. All Rights Reserved.
                                    </a>
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="{{ route('terms-conditions') }}">Terms &amp; Conditions</a></li>
                                    <li><a href="{{ route('privacy-policy') }}">Privacy Policy</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer close -->
    </div>

    <!-- Javascript Files
    ================================================== -->
    <script src="{{ asset('front-assets/js/plugins.js') }}"></script>
    <script src="{{ asset('front-assets/js/designesia.js') }}"></script>
    {{-- <script
        src="https://maps.googleapis.com/maps/api/js?key=insert_your_api_key_here&amp;libraries=places&amp;callback=initPlaces"
        async="" defer=""></script> --}}

    @include('sweetalert::alert')

    @stack('scripts')

</body>

</html>

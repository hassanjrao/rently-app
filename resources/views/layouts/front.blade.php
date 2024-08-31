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

<body>
    <div id="wrapper">

        <!-- page preloader begin -->
        {{-- <div id="de-preloader"></div> --}}
        <!-- page preloader close -->

        <!-- header begin -->
        <header class="transparent scroll-light has-topbar">
            <div id="topbar" class="topbar-dark text-light">
                <div class="container">
                    <div class="topbar-left xs-hide">
                        <div class="topbar-widget">
                            <div class="topbar-widget"><a href="#"><i class="fa fa-phone"></i>+208 333 9296</a>
                            </div>
                            <div class="topbar-widget"><a href="#"><i
                                        class="fa fa-envelope"></i>contact@rentaly.com</a></div>
                            <div class="topbar-widget"><a href="#"><i class="fa fa-clock-o"></i>Mon - Fri 08.00 -
                                    18.00</a></div>
                        </div>
                    </div>

                    <div class="topbar-right">
                        <div class="social-icons">
                            <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                            <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                            <a href="#"><i class="fa fa-youtube fa-lg"></i></a>
                            <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                            <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
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
                                            style="width: 100px"
                                                alt="">
                                            <img class="logo-2" src="{{ asset('front-assets/images/logo-light.png') }}"
                                            style="width: 100px"
                                                alt="">
                                        </a>
                                    </div>
                                    <!-- logo close -->
                                </div>
                            </div>
                            <div class="de-flex-col header-col-mid">
                                <ul id="mainmenu">
                                    <li><a class="{{ request()->is('/') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('cars*') ? 'active' : '' }}"
                                            href="{{ route('cars.index') }}">Cars</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('bookings/quick') ? 'active' : '' }}"
                                            href="{{ route('bookings.quick') }}">Quick Booking</a>

                                    </li>
                                    <li><a class="menu-item {{ request()->is('/') ? 'active' : '' }}"
                                            href="about.html">About Us</a></li>
                                    <li><a class="menu-item {{ request()->is('/') ? 'active' : '' }}"
                                            href="{{ route('contact-us.index') }}">Contact</a></li>

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
                            <h5>About Rentaly</h5>
                            <p>Where quality meets affordability. We understand the importance of a smooth and enjoyable
                                journey without the burden of excessive costs. That's why we have meticulously crafted
                                our offerings to provide you with top-notch vehicles at minimum expense.</p>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Contact Info</h5>
                            <address class="s1">
                                <span><i class="id-color fa fa-map-marker fa-lg"></i>08 W 36th St, New York, NY
                                    10001</span>
                                <span><i class="id-color fa fa-phone fa-lg"></i>+1 333 9296</span>
                                <span><i class="id-color fa fa-envelope-o fa-lg"></i><a
                                        href="mailto:contact@example.com">contact@example.com</a></span>
                                <span><i class="id-color fa fa-file-pdf-o fa-lg"></i><a href="#">Download
                                        Brochure</a></span>
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
                                        <li><a href="#">About</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3">
                        <div class="widget">
                            <h5>Social Network</h5>
                            <div class="social-icons">
                                <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                                <a href="#"><i class="fa fa-twitter fa-lg"></i></a>
                                <a href="#"><i class="fa fa-linkedin fa-lg"></i></a>
                                <a href="#"><i class="fa fa-pinterest fa-lg"></i></a>
                                <a href="#"><i class="fa fa-rss fa-lg"></i></a>
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
                                        Copyright 2024 - Rentaly by Designesia
                                    </a>
                                </div>
                                <ul class="menu-simple">
                                    <li><a href="#">Terms &amp; Conditions</a></li>
                                    <li><a href="#">Privacy Policy</a></li>
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

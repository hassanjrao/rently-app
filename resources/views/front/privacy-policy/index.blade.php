@extends('layouts.front')

@section('page-title', 'Privacy Policy')

@section('content')



<div class="no-bottom zebra" id="content">
    <div id="top"></div>

    <!-- section begin -->
    <section id="subheader" class="jarallax text-light">
        <img src="{{  asset('front-assets/images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Privacy Policy</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
    </section>
    <!-- section close -->




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


</div>

@endsection

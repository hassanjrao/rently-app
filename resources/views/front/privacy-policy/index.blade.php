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
                <div class="col-lg-12">

                    {!! $privacyPolicy->content !!}

                </div>
            </div>
        </div>

    </section>


</div>

@endsection

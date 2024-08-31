@extends('layouts.front')

@section('page-title', 'News')

@section('content')

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>
        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/subheader.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>News &amp; Updates</h1>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <section id="section-hero" aria-label="section">
            <div class="container">
                <div class="row gx-5">
                    <div class="col-lg-12">
                        <div class="row">


                            @foreach ($news as $nws)
                                <div class="col-lg-4 mb20">
                                    <div class="bloglist s2 item">
                                        <div class="post-content">
                                            <div class="post-image">
                                                <div class="date-box">
                                                    <div class="m">
                                                        {{ $nws->created_at->format('d') }}
                                                    </div>
                                                    <div class="d">
                                                        {{ $nws->created_at->format('M') }}
                                                    </div>
                                                </div>
                                                <img alt="" src="{{ $nws->image_url }}" class="lazy">
                                            </div>
                                            <div class="post-text">
                                                <h4><a href="{{ route('news.show',$nws->id) }}">
                                                        {{ $nws->title }}
                                                        <span></span></a></h4>
                                                <p>
                                                    {{ $nws->short_description }}
                                                </p>
                                                <a class="btn-main" href="{{ route('news.show',$nws->id) }}">Read More</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            <div class="spacer-single"></div>

                            <div class="d-flex justify-content-center">
                                {{ $news->links('pagination::bootstrap-4') }}
                            </div>

                        </div>
                    </div>

                    {{-- <div class="col-lg-4">
                        <div class="widget widget-post">
                            <h4>Recent Posts</h4>
                            <div class="small-border"></div>
                            <ul class="de-bloglist-type-1">

                                @foreach ($recentNews as $recentNws)
                                    <li>
                                        <div class="d-image">
                                            <img src="{{ $recentNws->image_url }}"
                                                alt="">
                                        </div>
                                        <div class="d-content">
                                            <a href="#">
                                                <h4>
                                                    {{ $recentNws->title }}
                                                </h4>
                                            </a>
                                            <div class="d-date">
                                                <span>{{ $recentNws->created_at->format('M d, Y') }}</span>
                                            </div>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>



                        <div class="widget">
                            <h4>Testimonials</h4>
                            <div class="small-border"></div>
                            <div class="owl-carousel owl-theme" id="testimonial-carousel-1-col">
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.
                                            </p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/1.jpg') }}">
                                                <span>John, Pixar Studio</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/2.jpg') }}">
                                                <span>Sarah, Microsoft</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/3.jpg') }}">
                                                <span>Michael, Apple</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/4.jpg') }}">
                                                <span>Thomas, Samsung</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/1.jpg') }}">
                                                <span>John, Pixar Studio</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/2.jpg') }}">
                                                <span>Sarah, Microsoft</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/3.jpg') }}">
                                                <span>Michael, Apple</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="de_testi type-2">
                                        <blockquote>
                                            <h4>Excellent Service!</h4>
                                            <p>Great support, like i have never seen before. Thanks to the support team,
                                                they are very helpfull. This company provide customers great solution, that
                                                makes them best.</p>
                                            <div class="de_testi_by">
                                                <img alt="" class="rounded-circle"
                                                    src="{{ asset('front-assets/images/people/4.jpg') }}">
                                                <span>Thomas, Samsung</span>
                                            </div>
                                        </blockquote>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> --}}
                </div>
            </div>
        </section>
    </div>
@endsection

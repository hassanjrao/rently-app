@extends('layouts.front')

@section('page-title', $news->title)

@section('content')

    <div class="no-bottom no-top" id="content">
        <div id="top"></div>

        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{  asset('front-assets/images/background/subheader.jpg')}}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>
                                {{ $news->title }}
                            </h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->

        <!-- section begin -->
        <section aria-label="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="blog-read">

                            <img alt="" src="{{ $news->image_url }}" class="img-fullwidth mb30">

                            <div class="post-text">
                               {!! $news->description !!}
                            </div>

                        </div>


                    </div>

                    <div id="sidebar" class="col-md-4">

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

                        <div class="widget widget-text">
                            <h4>About Us</h4>
                            <div class="small-border"></div>
                            <p class="small no-bottom">
                                Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
                                aspernatur aut odit aut fugit, sed quia consequuntur magni
                            </p>
                        </div>


                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection

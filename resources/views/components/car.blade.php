@props(['car'])


<div class="de-item mb30">
    <div class="d-img">
        <img src="{{ $car->main_image_url }}"
            class="img-fluid" alt="" style="width: 100%; height: 185px;">
    </div>
    <div class="d-info">
        <div class="d-text">
            <h4>
                <a href="{{ route('cars.show',$car->id) }}">{{ $car->name }}</a>
            </h4>
            {{-- <div class="d-item_like">
                <i class="fa fa-heart"></i><span>74</span>
            </div> --}}
            <div class="d-atr-group">
                <span class="d-atr"><img
                        src="{{ asset('front-assets/images/icons/1-green.svg') }}"
                        alt="">
                        {{ $car->seat->name }}
                </span>
                <span class="d-atr"><img
                        src="{{ asset('front-assets/images/icons/2-green.svg') }}"
                        alt="">
                        {{ $car->transmission->name }}
                    </span>
                <span class="d-atr"><img
                        src="{{ asset('front-assets/images/icons/3-green.svg') }}"
                        alt="">
                        {{ $car->doors }}
                    </span>
                <span class="d-atr"><img
                        src="{{ asset('front-assets/images/icons/4-green.svg') }}"
                        alt="">
                        {{ $car->bodyType->name }}
                    </span>
            </div>
            <div class="d-price">
                Daily rate from <span>{{ config('app.currency_symbol') }} {{ $car->daily_rate }}</span>
                <a class="btn-main" href="{{ route('cars.show',$car->id) }}">Rent Now</a>
            </div>
        </div>
    </div>
</div>

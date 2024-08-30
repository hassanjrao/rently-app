@extends('layouts.front')

@section('page-title', 'Cars')

@section('content')
    <div class="no-bottom no-top zebra" id="content">
        <div id="top"></div>


        <!-- section begin -->
        <section id="subheader" class="jarallax text-light">
            <img src="{{ asset('front-assets/images/background/2.jpg') }}" class="jarallax-img" alt="">
            <div class="center-y relative text-center">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h1>Cars</h1>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- section close -->


        <section id="section-cars">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">

                        <form action="{{ route('cars.index') }}" method="get" id="filterForm">

                            {{-- filter button --}}
                            <button type="submit" class="btn-main w-100 mb-4">Filter</button>


                            <div class="item_filter_group">
                                <h4>Vehicle Type</h4>
                                <div class="de_form">
                                    @foreach ($vehicleTypes as $type)
                                        <div class="de_checkbox">
                                            <input id="{{ 'vehicleType' . $type->id }}" name="vehicle_types[]"
                                                {{ in_array($type->id, $selectedVehicleTypes) ? 'checked' : '' }}
                                                type="checkbox" value="{{ $type->id }}">
                                            <label for="{{ 'vehicleType' . $type->id }}">
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>Car Body Type</h4>
                                <div class="de_form">

                                    @foreach ($bodyTypes as $type)
                                        <div class="de_checkbox">
                                            <input id="{{ 'bodyType' . $type->id }}" name="body_types[]" type="checkbox"
                                                {{ in_array($type->id, $selectedBodyTypes) ? 'checked' : '' }}
                                                value="{{ $type->id }}">
                                            <label for="{{ 'bodyType' . $type->id }}">
                                                {{ $type->name }}
                                            </label>
                                        </div>
                                    @endforeach



                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>Car Seats</h4>
                                <div class="de_form">

                                    @foreach ($seats as $seat)
                                        <div class="de_checkbox">
                                            <input id="{{ 'seat' . $seat->id }}" name="seats[]" type="checkbox"
                                            {{ in_array($seat->id, $selectedSeats) ? 'checked' : '' }}
                                                value="{{ $seat->id }}">
                                            <label for="{{ 'seat' . $seat->id }}">
                                                {{ $seat->name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>Car Engine Capacity (cc)</h4>
                                <div class="de_form">

                                    @foreach ($engines as $engine)
                                        <div class="de_checkbox">
                                            <input id="{{ 'engine' . $engine->id }}" name="engines[]" type="checkbox"
                                            {{ in_array($engine->id, $selectedEngines) ? 'checked' : '' }}
                                                value="{{ $engine->id }}">
                                            <label for="{{ 'engine' . $engine->id }}">
                                                {{ $engine->name }}
                                            </label>
                                        </div>
                                    @endforeach

                                </div>
                            </div>

                            <div class="item_filter_group">
                                <h4>Price ($)</h4>
                                <div class="price-input">
                                    <div class="field">
                                        <span>Min</span>
                                        <input type="number" class="input-min" value="0">
                                    </div>
                                    <div class="field">
                                        <span>Max</span>
                                        <input type="number" class="input-max" value="2000">
                                    </div>
                                </div>
                                <div class="slider">
                                    <div class="progress"></div>
                                </div>
                                <div class="range-input">
                                    <input type="range" class="range-min" min="0" max="2000" value="0"
                                        step="1">
                                    <input type="range" class="range-max" min="0" max="2000" value="2000"
                                        step="1">
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-lg-9">
                        <div class="row">

                            @foreach ($cars as $car)
                                <div class="col-xl-4 col-lg-6">
                                    <x-car :car="$car" />
                                </div>
                            @endforeach


                        </div>
                        <div class="d-flex justify-content-center">

                                {{ $cars->links('vendor.pagination.bootstrap-4') }}
                        </div>
                    </div>
                </div>
            </div>
        </section>


    </div>
@endsection

@push('scripts')
    <script>
        document.getElementById('filterForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let selectedVehicleTypes = [];
            let selectedBodyTypes = [];
            let selectedSeats = [];
            let selectedEngines = [];

            document.querySelectorAll('input[name="vehicle_types[]"]:checked').forEach(function(checkbox) {
                selectedVehicleTypes.push(checkbox.value);
            });

            document.querySelectorAll('input[name="body_types[]"]:checked').forEach(function(checkbox) {
                selectedBodyTypes.push(checkbox.value);
            });

            document.querySelectorAll('input[name="seats[]"]:checked').forEach(function(checkbox) {
                selectedSeats.push(checkbox.value);
            });

            document.querySelectorAll('input[name="engines[]"]:checked').forEach(function(checkbox) {
                selectedEngines.push(checkbox.value);
            });

            let queryString = '?';

            if (selectedVehicleTypes.length > 0) {
                queryString += 'vehicle_types=' + selectedVehicleTypes.join(',');
            }

            if (selectedBodyTypes.length > 0) {
                queryString += '&body_types=' + selectedBodyTypes.join(',');
            }

            if (selectedSeats.length > 0) {
                queryString += '&seats=' + selectedSeats.join(',');
            }

            if (selectedEngines.length > 0) {
                queryString += '&engines=' + selectedEngines.join(',');
            }

            console.log(queryString);

            window.location.href = '{{ route('cars.index') }}' + queryString;

        });
    </script>
@endpush

@extends('layouts.backend')

@php
    $addEdit = isset($car) ? 'Edit' : 'Add';
    $addUpdate = isset($car) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Car')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Car</h3>

                <a href="{{ route('admin.cars.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($car)
                    <form action="{{ route('admin.cars.update', $car->id) }}" method="POST" enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.cars.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $car ? $car->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('car_make', $car ? $car->car_make_id : null);

                                ?>
                                <label class="form-label" for="label"> Make <span class="text-danger">*</span></label>

                                <select required class="form-select" id="car_make" name="car_make" onchange="makeSelected(this)">
                                    <option value="">Select Make</option>
                                    @foreach ($carMakes as $car_make)
                                        <option value="{{ $car_make->id }}"
                                            @if ($car_make->id == $value) selected @endif>
                                            {{ $car_make->name }}</option>
                                    @endforeach
                                </select>

                                @error('car_make')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('car_model', $car ? $car->car_model_id : null);

                                ?>
                                <label class="form-label" for="label"> Model <span class="text-danger">*</span></label>

                                <select required class="form-select" id="car_model" name="car_model">
                                    <option value="">Select Model</option>

                                </select>

                                @error('car_make')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('daily_rate', $car ? $car->daily_rate : null);

                                ?>
                                <label class="form-label" for="label"> Daily rate <span
                                        class="text-danger">*</span></label>
                                <input required type="number" step=".01" value="{{ $value }}"
                                    class="form-control" id="daily_rate" name="daily_rate" placeholder="Enter daily rate">
                                @error('daily_rate')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('doors', $car ? $car->doors : null);

                                ?>
                                <label class="form-label" for="label"> Doors <span class="text-danger">*</span></label>
                                <input required type="number" value="{{ $value }}" class="form-control"
                                    id="doors" name="doors" placeholder="Enter Doors">
                                @error('doors')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('seats', $car ? $car->seat_id : null);

                                ?>
                                <label class="form-label" for="label"> Seats <span class="text-danger">*</span></label>

                                <select required class="form-select" id="seats" name="seats">
                                    <option value="">Select Type</option>
                                    @foreach ($seats as $seats)
                                        <option value="{{ $seats->id }}"
                                            @if ($seats->id == $value) selected @endif>
                                            {{ $seats->name }}</option>
                                    @endforeach
                                </select>

                                @error('seats')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('luggage', $car ? $car->luggage : null);

                                ?>
                                <label class="form-label" for="label"> Luggage <span class="text-danger">*</span></label>
                                <input required type="numeric" step=".01" value="{{ $value }}"
                                    class="form-control" id="luggage" name="luggage" placeholder="Enter Luggage">
                                @error('luggage')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('year', $car ? $car->year : null);

                                ?>
                                <label class="form-label" for="label"> Year <span class="text-danger">*</span></label>
                                <select required class="form-select" id="year" name="year">
                                    <option value="">Select Year</option>
                                    @for ($i = 2021; $i >= 1990; $i--)
                                        <option value="{{ $i }}"
                                            @if ($i == $value) selected @endif>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('year')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('mileage', $car ? $car->mileage : null);

                                ?>
                                <label class="form-label" for="label"> Mileage <span class="text-danger">*</span></label>
                                <input required type="number" value="{{ $value }}" class="form-control"
                                    id="mileage" name="mileage" placeholder="Enter mileage">
                                @error('mileage')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('fuel_economy', $car ? $car->fuel_economy : null);

                                ?>
                                <label class="form-label" for="label"> Fuel Economy <span
                                        class="text-danger">*</span></label>
                                <input required type="numeric" step=".01" value="{{ $value }}"
                                    class="form-control" id="fuel_economy" name="fuel_economy"
                                    placeholder="Enter Fuel Economy">
                                @error('fuel_economy')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('interior_color', $car ? $car->interior_color : null);

                                ?>
                                <label class="form-label" for="label"> Interior color <span
                                        class="text-danger">*</span></label>
                                <input required type="numeric" step=".01" value="{{ $value }}"
                                    class="form-control" id="interior_color" name="interior_color"
                                    placeholder="Enter Interior color">
                                @error('interior_color')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('exterior_color', $car ? $car->exterior_color : null);

                                ?>
                                <label class="form-label" for="label"> Exterior color <span
                                        class="text-danger">*</span></label>
                                <input required type="numeric" step=".01" value="{{ $value }}"
                                    class="form-control" id="exterior_color" name="exterior_color"
                                    placeholder="Enter Exterior color">
                                @error('interior_color')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('vehicle_type', $car ? $car->vehicle_type_id : null);

                                ?>
                                <label class="form-label" for="label"> Vehicle Type <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="vehicle_type" name="vehicle_type">
                                    <option value="">Select Type</option>
                                    @foreach ($vehicleTypes as $vehicleType)
                                        <option value="{{ $vehicleType->id }}"
                                            @if ($vehicleType->id == $value) selected @endif>
                                            {{ $vehicleType->name }}</option>
                                    @endforeach
                                </select>

                                @error('vehicle_type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('body_type', $car ? $car->body_type_id : null);

                                ?>
                                <label class="form-label" for="label"> Body Type <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="body_type" name="body_type">
                                    <option value="">Select Type</option>
                                    @foreach ($bodyTypes as $bodyType)
                                        <option value="{{ $bodyType->id }}"
                                            @if ($bodyType->id == $value) selected @endif>
                                            {{ $bodyType->name }}</option>
                                    @endforeach
                                </select>

                                @error('body_type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('fuel_type', $car ? $car->fuel_type_id : null);

                                ?>
                                <label class="form-label" for="label"> Fuel Type <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="fuel_type" name="fuel_type">
                                    <option value="">Select Type</option>
                                    @foreach ($fuelTypes as $fuelType)
                                        <option value="{{ $fuelType->id }}"
                                            @if ($fuelType->id == $value) selected @endif>
                                            {{ $fuelType->name }}</option>
                                    @endforeach
                                </select>

                                @error('fuel_type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('drive_type', $car ? $car->drive_type_id : null);

                                ?>
                                <label class="form-label" for="label"> Drive Type <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="drive_type" name="drive_type">
                                    <option value="">Select Type</option>
                                    @foreach ($driveTypes as $driveType)
                                        <option value="{{ $driveType->id }}"
                                            @if ($driveType->id == $value) selected @endif>
                                            {{ $driveType->name }}</option>
                                    @endforeach
                                </select>

                                @error('drive_type')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('transmission', $car ? $car->transmission_id : null);

                                ?>
                                <label class="form-label" for="label"> Transmission <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="transmission" name="transmission">
                                    <option value="">Select Type</option>
                                    @foreach ($transmissions as $transmission)
                                        <option value="{{ $transmission->id }}"
                                            @if ($transmission->id == $value) selected @endif>
                                            {{ $transmission->name }}</option>
                                    @endforeach
                                </select>

                                @error('transmission')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            {{-- <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('engine', $car ? $car->car_engine_id : null);

                                ?>
                                <label class="form-label" for="label"> Engine <span
                                        class="text-danger">*</span></label>

                                <select required class="form-select" id="engine" name="engine">
                                    <option value="">Select Type</option>
                                    @foreach ($engines as $engine)
                                        <option value="{{ $engine->id }}"
                                            @if ($engine->id == $value) selected @endif>
                                            {{ $engine->name }}</option>
                                    @endforeach
                                </select>

                                @error('engine')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                <?php
                                $value = old('features');

                                if ($car && $car->features) {
                                    $value = $car->features->pluck('id')->toArray();
                                }

                                if(!$value){
                                    $value = [];
                                }

                                ?>
                                <label class="form-label" for="label"> Features <span
                                        class="text-danger"></span></label>

                                <select multiple class="form-select" id="feature" name="features[]">
                                    <option value="" disabled>Select Feature(s)</option>
                                    @foreach ($features as $feature)
                                        <option value="{{ $feature->id }}"
                                            @if (in_array($feature->id, $value)) selected @endif>
                                            {{ $feature->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('feature')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($car && $car->main_image_path)
                                    <img src="{{ $car->main_image_url }}" alt="image" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Main Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="main_image_path"
                                    {{ $car ? '' : 'required' }} name="main_image">
                                @error('main_image')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>





                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $car ? $car->description : null);

                                ?>
                                <label class="form-label" for="label"> Description <span
                                        class="text-danger">*</span></label>
                                <textarea required class="form-control" id="description" name="description" placeholder="Enter description">{{ $value }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-6 col-md-6 col-sm-6 mb-4">
                                @if ($car)
                                    <div class="d-flex ">
                                        @foreach ($car->images as $image)
                                            <img src="{{ $image->image_url }}" alt="image" class="img-fluid" style="width: 100px">
                                        @endforeach
                                    </div>
                                @endif

                                <label class="form-label" for="label">More Images<span
                                        class="text-danger"></span></label>
                                <input type="file" accept="image/*" multiple class="form-control" id="more_images"
                                    name="more_images[]">
                                @error('more_images')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                        </div>

                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn"
                            class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')

<script>
    var carModels = @json($carModels);

    function makeSelected(select) {
        var selectedMake = select.value;
        var models = carModels.filter(carModel => carModel.car_make_id == selectedMake);

        var modelSelect = document.getElementById('car_model');
        modelSelect.innerHTML = '<option value="">Select Model</option>';

        models.forEach(model => {
            var option = document.createElement('option');
            option.value = model.id;
            option.text = model.name;
            modelSelect.add(option);
        });
    }
</script>

@endsection

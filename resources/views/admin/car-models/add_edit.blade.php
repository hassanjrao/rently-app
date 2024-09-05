@extends('layouts.backend')

@php
    $addEdit = isset($carModel) ? 'Edit' : 'Add';
    $addUpdate = isset($carModel) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Car Model')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Car Model</h3>

                <a href="{{ route('admin.vehicle-models.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($carModel)
                    <form action="{{ route('admin.vehicle-models.update', $carModel->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.vehicle-models.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('name', $carModel ? $carModel->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('car_make', $carModel ? $carModel->car_make_id : null);

                                ?>
                                <label class="form-label" for="label"> Car Make <span
                                        class="text-danger">*</span></label>
                                <select required class="form-select" id="car_make" name="car_make">
                                    <option value="">Select Car Make</option>
                                    @foreach ($carMakes as $carMake)
                                        <option value="{{ $carMake->id }}" @if ($value == $carMake->id) selected @endif>
                                            {{ $carMake->name }}</option>
                                    @endforeach
                                </select>
                                @error('car_make')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>




                        </div>

                    </div>



                    <div class="d-flex justify-content-end mt-4">

                        <button type="submit" id="submitBtn" class="btn btn-primary  border">{{ $addUpdate }}</button>

                    </div>

                </div>


                </form>


            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection

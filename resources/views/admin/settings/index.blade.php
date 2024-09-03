@extends('layouts.backend')

@section('page-title', 'Settings')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title"> {{ $setting->name }}</h3>


            </div>
            <div class="block-content">
                <form action="{{ route('admin.settings.update', $setting->id) }}" method="POST" enctype="multipart/form-data">
                    {{--  --}}
                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Phone</label>
                                    <input required type="text" value="{{ $setting->phone }}" class="form-control"
                                        id="phone" name="phone">
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Email</label>
                                    <input required type="email" value="{{ $setting->email }}" class="form-control"
                                        id="email" name="email">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Timings</label>
                                    <input required type="text" value="{{ $setting->timings }}" class="form-control"
                                        id="timings" name="timings">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Address</label>
                                    <input required type="text" value="{{ $setting->address }}" class="form-control"
                                        id="address" name="address">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Facebook Link</label>
                                    <input type="text" value="{{ $setting->facebook }}" class="form-control"
                                        id="facebook" name="facebook">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">Twitter Link</label>
                                    <input type="text" value="{{ $setting->twitter }}" class="form-control"
                                        id="twitter" name="twitter">
                                </div>

                                <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                    <label class="form-label" for="label">instagram Link</label>
                                    <input type="text" value="{{ $setting->instagram }}" class="form-control"
                                        id="instagram" name="instagram">
                                </div>




                            </div>




                        </div>



                    </div>

                    <div class="d-flex justify-content-end mb-4">

                        <button type="submit" class="btn btn-primary  border">Update</button>

                    </div>




                </form>
            </div>
        </div>





    </div>
    <!-- END Page Content -->
@endsection

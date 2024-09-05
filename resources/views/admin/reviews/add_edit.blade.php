@extends('layouts.backend')

@php
    $addEdit = isset($review) ? 'Edit' : 'Add';
    $addUpdate = isset($review) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Review')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Review</h3>

                <a href="{{ route('admin.reviews.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($review)
                    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.reviews.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('name', $review ? $review->name : null);

                                ?>
                                <label class="form-label" for="label"> Name <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="name" name="name" placeholder="Enter Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('review_title', $review ? $review->review_title : null);

                                ?>
                                <label class="form-label" for="label"> Review Title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="review_title" name="review_title" placeholder="Enter Review Title">
                                @error('review_title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>




                            <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                                <?php
                                $value = old('review', $review ? $review->review : null);

                                ?>
                                <label class="form-label" for="label"> Short review <span
                                        class="text-danger">*</span></label>
                                <textarea required class="form-control" id="review" name="review"
                                    placeholder="Enter review">{{ $value }}</textarea>
                                @error('review')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($review && $review->image_path)
                                    <img src="{{ $review->image_url }}" alt="image" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                    {{ $review ? '' : 'required' }} name="image_path">
                                @error('image_path')
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

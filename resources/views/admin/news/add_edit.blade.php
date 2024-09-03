@extends('layouts.backend')

@php
    $addEdit = isset($news) ? 'Edit' : 'Add';
    $addUpdate = isset($news) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' News')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} News</h3>

                <a href="{{ route('admin.news.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($news)
                    <form action="{{ route('admin.news.update', $news->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('title', $news ? $news->title : null);

                                ?>
                                <label class="form-label" for="label"> Title <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="title" name="title" placeholder="Enter Title">
                                @error('title')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('short_description', $news ? $news->short_description : null);

                                ?>
                                <label class="form-label" for="label"> Short Description <span
                                        class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="short_description" name="short_description" placeholder="Enter Short Description">
                                @error('short_description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="col-lg-8 col-md-8 col-sm-12 mb-4">
                                <?php
                                $value = old('description', $news ? $news->description : null);

                                ?>
                                <label class="form-label" for="label"> Short Description <span
                                        class="text-danger">*</span></label>
                                <textarea required class="form-control" id="description" name="description"
                                    placeholder="Enter Description">{{ $value }}</textarea>
                                @error('description')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-4 col-md-4 col-sm-12 mb-4">
                                @if ($news && $news->image)
                                    <img src="{{ $news->image_url }}" alt="image" class="img-fluid">
                                @endif

                                <label class="form-label" for="label">Image <span
                                        class="text-danger">*</span></label>
                                <input type="file" accept="image/*" class="form-control" id="image"
                                    {{ $news ? '' : 'required' }} name="image">
                                @error('image')
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

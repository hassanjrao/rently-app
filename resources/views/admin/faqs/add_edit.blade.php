@extends('layouts.backend')

@php
    $addEdit = isset($faq) ? 'Edit' : 'Add';
    $addUpdate = isset($faq) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' FAQ')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} FAQ</h3>

                <a href="{{ route('admin.faqs.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($faq)
                    <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.faqs.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">


                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('question', $faq ? $faq->question : null);

                                ?>
                                <label class="form-label" for="label"> Question <span
                                        class="text-danger">*</span></label>
                                <textarea required type="text" class="form-control"
                                    id="question" name="question" placeholder="Enter question">{{ $value }}</textarea>
                                @error('question')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <?php
                                $value = old('answer', $faq ? $faq->answer : null);

                                ?>
                                <label class="form-label" for="label"> Answer <span
                                        class="text-danger">*</span></label>
                                <textarea required type="text" class="form-control"
                                    id="answer" name="answer" placeholder="Enter answer">{{ $value }}</textarea>
                                @error('answer')
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

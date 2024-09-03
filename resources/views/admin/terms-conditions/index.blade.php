@extends('layouts.backend')

@section('page-title', 'Terms Conditions')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">Terms & Conditions</h3>
            </div>
            <div class="block-content">
                <form action="{{ route('admin.terms-conditions.update', $termsCondition->id) }}" method="POST"
                    enctype="multipart/form-data">
                    {{--  --}}
                    @csrf
                    @method('PUT')

                    <div class="row push justify-content-center">

                        <div class="col-lg-12 ">

                            <div class="row mb-4">



                                <div class="col-lg-12 col-md-12 col-sm-12">
                                    <textarea id="editor" name="content" style="display: none;">{!! $termsCondition->content !!}</textarea>

                                    @error('content')
                                        <span class="text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

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
@section('js_after')

    <!-- Page JS Plugins -->
    {{-- <script src="{{ asset('js/plugins/ckeditor5-classic/build/ckeditor.js') }}"></script> --}}
    <script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

    <!-- Page JS Helpers (CKEditor 5 plugins) -->
    {{-- <script>One.helpersOnLoad(['js-ckeditor5']);</script> --}}

    <script>
        ClassicEditor
            .create(document.querySelector('#editor'), {

            })
            .catch(error => {
                console.error(error);
            });
    </script>


@endsection

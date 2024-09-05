@extends('layouts.backend')

@section('page-title', 'Reviews')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Reviews
                </h3>


                <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Title</th>
                                <th>Review</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($reviews as $ind => $review)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $review->name }}</td>
                                    <td>{{ $review->review_title }}</td>
                                    <td>{{ $review->review }}</td>
                                    <td><img src="{{ $review->image_url }}" alt="" width="100"></td>

                                    <td>{{ $review->created_at }}</td>
                                    <td>{{ $review->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.reviews.edit', $review->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $review->id }}"
                                            action="{{ route('admin.reviews.destroy', $review->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $review->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>

        </div>

    </div>








    </div>
    <!-- END Page Content -->
@endsection

@section('js_after')


@endsection

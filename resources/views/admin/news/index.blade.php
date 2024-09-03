@extends('layouts.backend')

@section('page-title', 'News')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    News
                </h3>


                <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Short Description</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($news as $ind => $nws)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $nws->title }}</td>
                                    <td>{{ $nws->short_description }}</td>
                                    <td>{{ $nws->description }}</td>
                                    <td><img src="{{ $nws->image_url }}" alt="" width="100"></td>

                                    <td>{{ $nws->created_at }}</td>
                                    <td>{{ $nws->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.news.edit', $nws->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $nws->id }}"
                                            action="{{ route('admin.news.destroy', $nws->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $nws->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

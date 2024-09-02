@extends('layouts.backend')

@section('page-title', 'Vehicle Types')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Vehicle Types
                </h3>


                <a href="{{ route('admin.vehicle-types.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tvehicle>
                            @foreach ($vehicleTypes as $ind => $vehicleType)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $vehicleType->name }}</td>

                                    <td>{{ $vehicleType->created_at }}</td>
                                    <td>{{ $vehicleType->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.vehicle-types.edit', $vehicleType->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $vehicleType->id }}"
                                            action="{{ route('admin.vehicle-types.destroy', $vehicleType->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $vehicleType->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                                title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>

                                        </form>
                                    </td>


                                </tr>
                            @endforeach
                        </tvehicle>

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

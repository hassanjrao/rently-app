@extends('layouts.backend')

@section('page-title', 'Contact Us Requests')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Contact Us Requests
                </h3>


                {{-- <a href="{{ route('admin.contactUsRequests.create') }}" class="btn btn-primary">Add</a> --}}



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($contactUsRequests as $ind => $contactUsRequest)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $contactUsRequest->name }}</td>
                                    <td>{{ $contactUsRequest->phone }}</td>
                                    <td>{{ $contactUsRequest->email }}</td>
                                    <td>{{ $contactUsRequest->message }}</td>
                                    <td>{{ $contactUsRequest->created_at }}</td>
                                    <td>{{ $contactUsRequest->updated_at }}</td>

                                    <td>
                                        <form id="form-{{ $contactUsRequest->id }}"
                                            action="{{ route('admin.contact-us-requests.destroy', $contactUsRequest->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $contactUsRequest->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

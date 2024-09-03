@extends('layouts.backend')

@section('page-title', 'Bookings')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Bookings
                </h3>





            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Phone</th>
                                <th>Car</th>
                                <th >Status</th>
                                <th>Pickup Date Time</th>
                                <th>Return Date Time</th>
                                <th>Pickup Location</th>
                                <th>Destination Location</th>
                                <th>Request</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($bookings as $ind => $booking)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $booking->user->name }}</td>
                                    <td>{{ $booking->user->phone }}</td>
                                    <td>{{ $booking->car->name }}</td>
                                    <td>

                                        <form id="form-update-status-{{ $booking->id }}"
                                            action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')


                                            <select name="status" class="form-select"
                                            style="width: 160px !important"
                                            onchange="updateStatus({{ $booking->id }}, this.value)">
                                            <option value="pending"
                                                {{ $booking->status == 'pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="approved"
                                                {{ $booking->status == 'approved' ? 'selected' : '' }}>
                                                Approved</option>
                                            <option value="cancelled"
                                                {{ $booking->status == 'cancelled' ? 'selected' : '' }}>
                                                Cancelled</option>
                                        </select>


                                        </form>



                                    </td>
                                    <td>{{ $booking->pickup_date_time }}</td>
                                    <td>{{ $booking->return_date_time }}</td>
                                    <td>{{ $booking->pickupLocation->name }}</td>
                                    <td>{{ $booking->destinationLocation->name }}</td>
                                    <td>{{ $booking->request }}</td>



                                    <td>{{ $booking->created_at }}</td>
                                    <td>{{ $booking->updated_at }}</td>

                                    <td>

                                        <form id="form-{{ $booking->id }}"
                                            action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $booking->id }})"
                                                class="btn btn-sm btn-danger" data-toggle="tooltip" title="Delete">
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

    <script>
        function updateStatus(id, status) {
            document.getElementById('form-update-status-' + id).submit();
        }
    </script>

@endsection

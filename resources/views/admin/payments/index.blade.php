@extends('layouts.backend')

@section('page-title', 'Payments')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Payments
                </h3>


                <a href="{{ route('admin.payments.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Booking ID</th>
                                <th>Payment Method</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Time</th>
                                <th>Term</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Amount</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($payments as $ind => $payment)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $payment->booking->booking_id }}</td>
                                    <td>{{ $payment->paymentMethod->name }}</td>
                                    <td>{{ $payment->status }}</td>
                                    <td>{{ $payment->date }}</td>
                                    <td>{{ $payment->time }}</td>
                                    <td>{{ $payment->term }}</td>
                                    <td>{{ $payment->start_date }}</td>
                                    <td>{{ $payment->end_date }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>{{ $payment->created_at }}</td>
                                    <td>{{ $payment->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.payments.edit', $payment->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $payment->id }}"
                                            action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $payment->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

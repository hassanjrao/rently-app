@extends('layouts.backend')

@php
    $addEdit = isset($payment) ? 'Edit' : 'Add';
    $addUpdate = isset($payment) ? 'Update' : 'Add';
@endphp
@section('page-title', $addEdit . ' Payment')
@section('content')

    <!-- Page Content -->
    <div class="content content-boxed">

        <div class="block block-rounded">
            <div class="block-header block-header-default d-flex">
                <h3 class="block-title">{{ $addEdit }} Payment</h3>

                <a href="{{ route('admin.payments.index') }}" class="btn btn-primary">Back</a>


            </div>
            <div class="block-content">

                @if ($payment)
                    <form action="{{ route('admin.payments.update', $payment->id) }}" method="POST"
                        enctype="multipart/form-data">

                        @csrf
                        @method('PUT')
                    @else
                        <form action="{{ route('admin.payments.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf
                @endif


                <div class="row push justify-content-center">

                    <div class="col-lg-12 ">



                        <div class="row mb-4">

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('booking_id', $payment ? $payment->booking_id : null);

                                ?>
                                <label class="form-label" for="label"> Booking ID <span
                                        class="text-danger">*</span></label>
                                <select required class="form-select" id="booking_id" name="booking_id">
                                    <option value="">Select Booking ID</option>
                                    @foreach ($bookings as $booking)
                                        <option value="{{ $booking->id }}"
                                            @if ($value == $booking->id) selected @endif>
                                            {{ $booking->booking_id }}</option>
                                    @endforeach
                                </select>
                                @error('booking_id')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('payment_method', $payment ? $payment->payment_method_id : null);

                                ?>
                                <label class="form-label" for="label"> Payment Method <span
                                        class="text-danger">*</span></label>
                                <select required class="form-select" id="payment_method" name="payment_method">
                                    <option value="">Select Payment Method</option>
                                    @foreach ($paymentMethods as $paymentMethod)
                                        <option value="{{ $paymentMethod->id }}"
                                            @if ($value == $paymentMethod->id) selected @endif>
                                            {{ $paymentMethod->name }}</option>
                                    @endforeach
                                </select>
                                @error('payment_method')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('status', $payment ? $payment->status : null);

                                ?>
                                <label class="form-label" for="label"> Status <span class="text-danger">*</span></label>
                                <select required class="form-select" id="status" name="status">
                                    <option value="">Select Status</option>
                                    <option @if ($value == 'pending') selected @endif value="pending">Pending
                                    </option>
                                    <option @if ($value == 'requested') selected @endif value="requested">Requested
                                    </option>
                                    <option @if ($value == 'declined') selected @endif value="declined">Declined
                                    </option>
                                    <option @if ($value == 'received') selected @endif value="received">Received
                                    </option>
                                </select>
                                @error('status')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('amount', $payment ? $payment->amount : null);

                                ?>
                                <label class="form-label" for="label"> Amount <span class="text-danger">*</span></label>
                                <input required type="number" step=".01" value="{{ $value }}" class="form-control"
                                    id="amount" name="amount" placeholder="Enter Amount">
                                @error('amount')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('date', $payment ? $payment->date : null);

                                ?>
                                <label class="form-label" for="label"> Date <span class="text-danger">*</span></label>
                                <input required type="date" value="{{ $value }}" class="form-control"
                                    id="date" name="date" placeholder="Select Date">
                                @error('date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('time', $payment ? $payment->time : null);

                                ?>
                                <label class="form-label" for="label"> Time <span class="text-danger">*</span></label>
                                <input required type="time" value="{{ $value }}" class="form-control"
                                    id="time" name="time" placeholder="Select Time">
                                @error('time')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('term', $payment ? $payment->term : null);

                                ?>
                                <label class="form-label" for="label"> Term <span class="text-danger">*</span></label>
                                <input required type="text" value="{{ $value }}" class="form-control"
                                    id="term" name="term" placeholder="Enter Term">
                                @error('term')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('start_date', $payment ? $payment->start_date : null);

                                ?>
                                <label class="form-label" for="label"> Start Date <span class="text-danger">*</span></label>
                                <input required type="date" value="{{ $value }}" class="form-control"
                                    id="start_date" name="start_date" placeholder="Enter Start Date">
                                @error('start_date')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                                <?php
                                $value = old('end_date', $payment ? $payment->end_date : null);

                                ?>
                                <label class="form-label" for="label"> End Date <span class="text-danger">*</span></label>
                                <input required type="date" value="{{ $value }}" class="form-control"
                                    id="end_date" name="end_date" placeholder="Enter End Date">
                                @error('end_date')
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

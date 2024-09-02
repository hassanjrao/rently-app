@extends('layouts.backend')

@section('page-title', 'Cars')
@section('css_before')
    <!-- Page JS Plugins CSS -->

@endsection



@section('content')
    <!-- Page Content -->
    <div class="content">


        <div class="block block-rounded">
            <div class="block-header block-header-default">
                <h3 class="block-title">
                    Cars
                </h3>


                <a href="{{ route('admin.cars.create') }}" class="btn btn-primary">Add</a>



            </div>

            <div class="block-content block-content-full">
                <!-- DataTables init on table by adding .js-dataTable-buttons class, functionality is initialized in js/pages/tables_datatables.js -->
                <div class="table-responsive">

                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Main Image</th>
                                <th>Description</th>
                                <th>Daily Rate</th>
                                <th>Seats</th>
                                <th>Doors</th>
                                <th>Luggage</th>
                                <th>Year</th>
                                <th>Mileage</th>
                                <th>Fuel Economy</th>
                                <th>Exterior Color</th>
                                <th>Interior Color</th>
                                <th>Vehicle Type</th>
                                <th>Body Type</th>
                                <th>Drive Type</th>
                                <th>Fuel Type</th>
                                <th>Transmission</th>
                                <th>Engine</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>

                            </tr>


                        </thead>

                        <tbody>
                            @foreach ($cars as $ind => $car)
                                <tr>

                                    <td>{{ $ind + 1 }}</td>
                                    <td>{{ $car->name }}</td>
                                    <td><img src="{{ $car->main_image_url }}" alt="" width="100"></td>
                                    <td>{{ $car->description }}</td>
                                    <td>{{ $car->daily_rate }}</td>
                                    <td>{{ $car->seat->name }}</td>
                                    <td>{{ $car->doors }}</td>
                                    <td>{{ $car->luggage }}</td>
                                    <td>{{ $car->year }}</td>
                                    <td>{{ $car->mileage }}</td>
                                    <td>{{ $car->fuel_economy }}</td>
                                    <td>{{ $car->exterior_color }}</td>
                                    <td>{{ $car->interior_color }}</td>
                                    <td>{{ $car->vehicleType->name }}</td>
                                    <td>{{ $car->bodyType->name }}</td>
                                    <td>{{ $car->driveType->name }}</td>
                                    <td>{{ $car->fuelType->name }}</td>
                                    <td>{{ $car->transmission->name }}</td>
                                    <td>{{ $car->carEngine->name }}</td>




                                    <td>{{ $car->created_at }}</td>
                                    <td>{{ $car->updated_at }}</td>

                                    <td>
                                        <a href="{{ route('admin.cars.edit', $car->id) }}" class="btn btn-sm btn-primary"
                                            data-toggle="tooltip" title="Edit">
                                            <i class="fa fa-pencil-alt"></i>
                                        </a>
                                        <form id="form-{{ $car->id }}"
                                            action="{{ route('admin.cars.destroy', $car->id) }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="button" onclick="confirmDelete({{ $car->id }})" class="btn btn-sm btn-danger" data-toggle="tooltip"
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

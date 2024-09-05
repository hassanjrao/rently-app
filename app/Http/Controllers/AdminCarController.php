<?php

namespace App\Http\Controllers;

use App\Models\BodyType;
use App\Models\Car;
use App\Models\CarEngine;
use App\Models\CarMake;
use App\Models\CarModel;
use App\Models\DriveType;
use App\Models\Feature;
use App\Models\FuelType;
use App\Models\Seat;
use App\Models\Transmission;
use App\Models\VehicleType;
use Illuminate\Http\Request;

class AdminCarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::latest()
            ->with(['seat', 'vehicleType', 'bodyType', 'fuelType', 'transmission', 'carEngine', 'driveType','carMake','carModel'])
            ->get();

        return view('admin.cars.index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $car = null;
        $vehicleTypes = VehicleType::latest()->get();
        $bodyTypes = BodyType::latest()->get();
        $fuelTypes = FuelType::latest()->get();
        $engines = CarEngine::latest()->get();
        $seats = Seat::latest()->get();
        $transmissions = Transmission::latest()->get();
        $driveTypes = DriveType::latest()->get();
        $features = Feature::latest()->get();
        $carMakes=CarMake::latest()->get();
        $carModels=CarModel::latest()->get();

        return view('admin.cars.add_edit', compact('car', 'vehicleTypes', 'bodyTypes', 'fuelTypes', 'engines', 'seats', 'transmissions', 'driveTypes', 'features','carMakes','carModels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'daily_rate' => 'required|numeric',
            'doors' => 'required|numeric',
            'seats' => 'required|exists:seats,id',
            'luggage' => 'required',
            'year' => 'required',
            'mileage' => 'required|numeric',
            'fuel_economy' => 'required',
            'interior_color' => 'required',
            'exterior_color' => 'required',
            'vehicle_type' => 'required|exists:vehicle_types,id',
            'body_type' => 'required|exists:body_types,id',
            'fuel_type' => 'required|exists:fuel_types,id',
            'drive_type' => 'required|exists:drive_types,id',
            'transmission' => 'required|exists:transmissions,id',
            'engine' => 'required|exists:car_engines,id',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
            'description' => 'required',
            'main_image' => 'required|image',
            'more_images' => 'nullable|array|max:10',
            'car_make'=>'required|exists:car_makes,id',
            'car_model'=>'required|exists:car_models,id',

        ]);

        $car = Car::create([
            'name' => $request->name,
            'daily_rate' => $request->daily_rate,
            'doors' => $request->doors,
            'seat_id' => $request->seats,
            'luggage' => $request->luggage,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'fuel_economy' => $request->fuel_economy,
            'interior_color' => $request->interior_color,
            'exterior_color' => $request->exterior_color,
            'vehicle_type_id' => $request->vehicle_type,
            'body_type_id' => $request->body_type,
            'fuel_type_id' => $request->fuel_type,
            'drive_type_id' => $request->drive_type,
            'transmission_id' => $request->transmission,
            'car_engine_id' => $request->engine,
            'description' => $request->description,
            'main_image_path' => $request->file('main_image')->store('cars'),
            'car_make_id'=>$request->car_make,
            'car_model_id'=>$request->car_model,

        ]);


        foreach ($request->file('more_images') as $image) {
            $car->images()->create([
                'image_path' => $image->store('cars'),
            ]);
        }

        $car->features()->attach($request->features);




        return redirect()->route('admin.cars.index')->withToastSuccess('Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::findorfail($id);

        $vehicleTypes = VehicleType::latest()->get();
        $bodyTypes = BodyType::latest()->get();
        $fuelTypes = FuelType::latest()->get();
        $engines = CarEngine::latest()->get();
        $seats = Seat::latest()->get();
        $transmissions = Transmission::latest()->get();
        $driveTypes = DriveType::latest()->get();
        $features = Feature::latest()->get();

        return view('admin.cars.add_edit', compact('car', 'vehicleTypes', 'bodyTypes', 'fuelTypes', 'engines', 'seats', 'transmissions', 'driveTypes', 'features'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $car = Car::findorfail($id);

        $request->validate([
            'name' => 'required',
            'daily_rate' => 'required|numeric',
            'doors' => 'required|numeric',
            'seats' => 'required|exists:seats,id',
            'luggage' => 'required',
            'year' => 'required',
            'mileage' => 'required|numeric',
            'fuel_economy' => 'required',
            'interior_color' => 'required',
            'exterior_color' => 'required',
            'vehicle_type' => 'required|exists:vehicle_types,id',
            'body_type' => 'required|exists:body_types,id',
            'fuel_type' => 'required|exists:fuel_types,id',
            'drive_type' => 'required|exists:drive_types,id',
            'transmission' => 'required|exists:transmissions,id',
            'engine' => 'required|exists:car_engines,id',
            'features' => 'nullable|array',
            'features.*' => 'exists:features,id',
            'description' => 'required',
            'main_image' => 'nullable|image',
            'more_images' => 'nullable|array|max:10',

        ]);

        $car->update([
            'name' => $request->name,
            'daily_rate' => $request->daily_rate,
            'doors' => $request->doors,
            'seat_id' => $request->seats,
            'luggage' => $request->luggage,
            'year' => $request->year,
            'mileage' => $request->mileage,
            'fuel_economy' => $request->fuel_economy,
            'interior_color' => $request->interior_color,
            'exterior_color' => $request->exterior_color,
            'vehicle_type_id' => $request->vehicle_type,
            'body_type_id' => $request->body_type,
            'fuel_type_id' => $request->fuel_type,
            'drive_type_id' => $request->drive_type,
            'transmission_id' => $request->transmission,
            'car_engine_id' => $request->engine,
            'description' => $request->description,
        ]);

        if ($request->hasFile('main_image')) {
            $car->update([
                'main_image_path' => $request->file('main_image')->store('cars'),
            ]);
        }

        if($request->more_images){
            // delete all images
            $car->images()->delete();

            foreach ($request->file('more_images') as $image) {
                $car->images()->create([
                    'image_path' => $image->store('cars'),
                ]);
            }
        }

        $car->features()->sync($request->features);


        return redirect()->route('admin.cars.index')->withToastSuccess('Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Car::findorfail($id)->delete();

        return back()->withToastSuccess('Deleted successfully');
    }
}

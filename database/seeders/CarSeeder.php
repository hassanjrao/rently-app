<?php

namespace Database\Seeders;

use App\Models\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $car = Car::create([
            'name' => 'BMW M2 2020',
            'description' => 'The BMW M2 is the high-performance version of the 2 Series 2-door coupé. The first generation of the M2 is the F87 coupé and is powered by turbocharged.',
            'body_type_id' => 1,
            'car_seat_id' => 1,
            'vehicle_type_id' => 1,
            'doors' => 2,
            'luggage' => 150,
            'fuel_type_id' => 1,
            'car_engine_id' => 1,
            'drive_type_id' => 1,
            'transmission_id' => 1,
            'year' => '2024',
            'mileage' => '200',
            'transmission_id' => 1,
            'fuel_economy' => '10.5L/100km',
            'exterior_color' => 'Black',
            'interior_color' => 'Black',
            'daily_rate' => 200.00
        ]);

        $car->features()->attach([1, 2, 3, 4]);


        for ($i = 1; $i <= 4; $i++) {
            $car->images()->create([
                'image_path' => 'cars/car1.png'
            ]);
        }
    }
}

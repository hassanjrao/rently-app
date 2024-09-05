<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarModel::create(['name' => 'Corolla', 'car_make_id' => 1]);
        CarModel::create(['name' => 'Civic', 'car_make_id' => 2]);
        CarModel::create(['name' => 'F150', 'car_make_id' => 3]);
    }
}

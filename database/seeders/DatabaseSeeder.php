<?php

namespace Database\Seeders;

use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            CarSeatSeeder::class,
            CarFeatureSeeder::class,
            VehicleTypeSeeder::class,
            BodyTypeSeeder::class,
            CarEngineSeeder::class,
            FuelTypeSeeder::class,
            TransmissionSeeder::class,
            DriveTypeSeeder::class,
            LocationSeeder::class,
            CarSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            NewsSeeder::class,
            SettingSeeder::class,
        ]);
    }
}

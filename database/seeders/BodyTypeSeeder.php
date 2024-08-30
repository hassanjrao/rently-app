<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BodyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Convertible
        // Coupe
        // Exotic Cars
        // Hatchback
        // Minivan
        // Truck
        // Sedan
        // Sports Car
        // Station Wagon
        // SUV
        $types=[
            [
                'name'=>'Convertible',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Coupe',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Exotic Cars',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Hatchback',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Minivan',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Truck',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sedan',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sports Car',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Station Wagon',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'SUV',
                'created_at'=>now(),
                'updated_at'=>now()
            ],

        ];

        DB::table('body_types')->insert($types);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Car
            // Van
            // Minibus
            // Prestige

        $types=[
            [
                'name'=>'Car',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Van',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Minibus',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Prestige',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];

        DB::table('vehicle_types')->insert($types);
    }
}

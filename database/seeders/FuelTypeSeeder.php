<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FuelTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Diesel
        // Electric
        // Gasoline
        // Hybrid
        // Hydrogen
        // LPG
        // Petrol
        // Plug-in Hybrid
        // Solar
        // Other
        $types=[
            [
                'name'=>'Diesel',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Electric',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Gasoline',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Hybrid',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Hydrogen',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'LPG',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Petrol',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Plug-in Hybrid',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Solar',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Other',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        DB::table('fuel_types')->insert($types);
    }
}

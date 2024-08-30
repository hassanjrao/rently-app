<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            // Bluetooth
            // Multimedia Player
            // Central Lock
            // Sunroof

        $features=[
            [
                'name'=>'Bluetooth',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Multimedia Player',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Central Lock',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Sunroof',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];

        DB::table('features')->insert($features);
    }
}

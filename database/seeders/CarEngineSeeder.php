<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarEngineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 1.5L
        // 1.6L
        // 2.0L
        // 2.5L

        $engines = [
            [
                'name' => '1.5L',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '1.6L',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '2.0L',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '2.5L',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('car_engines')->insert($engines);
    }
}

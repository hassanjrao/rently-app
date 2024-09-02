<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarSeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 2 seats
        // 4 seats
        // 6 seats
        // 6+ seats

        $seats = [
            [
                'name' => '2 seats',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '4 seats',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '6 seats',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '6+ seats',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('seats')->insert($seats);
    }
}

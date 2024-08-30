<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // automatic
        // manual
        // semi-automatic
        // dual-clutch
        // hybrid

        $transmissions = [
            [
                'name' => 'Automatic',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Manual',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Semi-automatic',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Dual-clutch',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hybrid',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('transmissions')->insert($transmissions);
    }
}

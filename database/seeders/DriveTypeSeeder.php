<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DriveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 4WD
        // AWD
        // FWD
        // RWD
        // Other
        $types=[
            [
                'name'=>'4WD',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'AWD',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'FWD',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'RWD',
                'created_at'=>now(),
                'updated_at'=>now()
            ],
            [
                'name'=>'Other',
                'created_at'=>now(),
                'updated_at'=>now()
            ]
        ];
        DB::table('drive_types')->insert($types);
    }
}

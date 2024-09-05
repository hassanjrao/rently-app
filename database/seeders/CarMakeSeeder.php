<?php

namespace Database\Seeders;

use App\Models\CarMake;
use Illuminate\Database\Seeder;

class CarMakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarMake::create(['name' => 'Toyota']);
        CarMake::create(['name' => 'Honda']);
        CarMake::create(['name' => 'Ford']);
    }
}

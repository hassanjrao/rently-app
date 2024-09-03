<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TermsConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\TermsCondition::create([
            'content' => 'This is the terms and conditions content.'
        ]);
    }
}

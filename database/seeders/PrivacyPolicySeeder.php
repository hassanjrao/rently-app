<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PrivacyPolicySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\PrivacyPolicy::create([
            'content' => 'This is the privacy policy content.'
        ]);
    }
}

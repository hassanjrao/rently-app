<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::firstOrCreate([
            'id'=>1
        ],[
            'phone'=>'1234567890',
            'email'=>'contact@info.com',
            'timings'=>'9:00 AM - 5:00 PM',
            'address'=>'123 Main St, New York, NY 10001',
            'facebook'=>'https://www.facebook.com/',
            'twitter'=>'https://www.twitter.com/',
            'instagram'=>'https://www.instagram.com/',
        ]);
    }
}

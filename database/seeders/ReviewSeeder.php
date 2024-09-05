<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'name' => 'John Doe',
            'review_title' => 'Great Car',
            'review'=>'I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.',
            'image_path' => 'images/review1.jpg'
        ]);
        Review::create([
            'name' => 'John Doe',
            'review_title' => 'Great Car',
            'review'=>'I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.',
            'image_path' => 'images/review1.jpg'
        ]);

        Review::create([
            'name' => 'John Doe',
            'review_title' => 'Great Car',
            'review'=>'I have been using Rentaly for my Car Rental needs for over 5 years now. I have never had any problems with their service. Their customer support is always responsive and helpful. I would recommend Rentaly to anyone looking for a reliable Car Rental provider.',
            'image_path' => 'images/review1.jpg'
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faqs = [
            [
                'question' => 'How do I get started with Car Rental?',
                'answer' => 'You can get started with Car Rental by signing up for an account. Once you have an account, you can search for cars and book them.'
            ],
            [
                'question' => 'How do I book a car?',
                'answer' => 'You can book a car by searching for a car that you like and clicking on the "Book Now" button.'
            ],
            [
                'question' => 'How do I cancel a booking?',
                'answer' => 'You can cancel a booking by going to the "My Bookings" page and clicking on the "Cancel Booking" button.'
            ],
            [
                'question' => 'How do I contact Car Rental?',
                'answer' => 'You can contact Car Rental by sending an email to'
            ],
            [
                'question' => 'How do I change my password?',
                'answer' => 'You can change your password by going to the "My Account" page and clicking on the "Change Password" button.'
            ],
            [
                'question' => 'How do I change my password?',
                'answer' => 'You can change your password by going to the "My Account" page and clicking on the "Change Password" button.'
            ],

        ];

        DB::table('faqs')->insert($faqs);
    }
}

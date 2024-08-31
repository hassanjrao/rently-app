<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        News::create([
            'title' => 'The best car in the world',
            'short_description' => 'The best car in the world is the one that suits your needs',
            'description' => 'The best car in the world is the one that suits your needs. It is not the most expensive, the fastest, or the most luxurious. The best car is the one that meets your needs and fits your lifestyle. Whether you need a family car, a work truck, or a sports car, the best car is the one that is right for you.',
            'image' => 'https://via.placeholder.com/150',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\PaymentMethod;
use Illuminate\Database\Seeder;

class PaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentMethod::create(['name' => 'Card']);
        PaymentMethod::create(['name' => 'Cash']);
        PaymentMethod::create(['name' => 'Zelle']);
        PaymentMethod::create(['name' => 'CashApp']);
    }
}

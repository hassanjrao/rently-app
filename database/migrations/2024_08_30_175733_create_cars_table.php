<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('description');
            $table->decimal('daily_rate', 8, 2);

            $table->integer('doors');

            $table->string('luggage')->nullable();

            $table->string('engine')->nullable();

            $table->year('year');

            $table->integer('mileage');

            $table->string('drive');

            $table->string('fuel_economy');

            $table->string('exterior_color');
            $table->string('interior_color');

            $table->foreignId('vehicle_type_id')->constrained();
            $table->foreignId('body_type_id')->constrained();
            $table->foreignId('car_seat_id')->constrained();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cars');
    }
}

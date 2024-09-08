<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeEngineIdNullableInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {

            $table->foreignId('car_engine_id')->nullable()->change();
            $table->foreignId('seat_id')->nullable()->change();
            $table->foreignId('fuel_type_id')->nullable()->change();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars', function (Blueprint $table) {
            $table->unsignedBigInteger('car_engine_id')->nullable(false)->change();
            $table->unsignedBigInteger('seat_id')->nullable(false)->change();
            $table->unsignedInteger('fuel_type_id')->nullable(false)->change();
        });
    }
}

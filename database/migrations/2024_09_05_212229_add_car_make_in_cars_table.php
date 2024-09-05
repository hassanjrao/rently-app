<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCarMakeInCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {

            $table->foreignId('car_make_id')
            ->nullable()
            ->constrained('car_makes')->onDelete('cascade');

            $table->foreignId('car_model_id')
            ->nullable()
            ->constrained('car_models')->onDelete('cascade');

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

            $table->dropForeign(['car_make_id']);
            $table->dropColumn('car_make_id');

            $table->dropForeign(['car_model_id']);
            $table->dropColumn('car_model_id');
        });
    }
}

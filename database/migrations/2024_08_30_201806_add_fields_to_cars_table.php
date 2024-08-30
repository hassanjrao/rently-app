<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {

            $table->dropColumn('drive');

            $table->foreignId('drive_type_id')->constrained()->onDelete('cascade');

            $table->foreignId('transmission_id')->constrained()->onDelete('cascade');

            $table->foreignId('car_engine_id')->constrained()->onDelete('cascade');

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
            //
        });
    }
}

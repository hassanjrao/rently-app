<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMainImageCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Add a new column to the cars table
        Schema::table('cars', function (Blueprint $table) {
            $table->string('main_image_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the column from the cars table
        Schema::table('cars', function (Blueprint $table) {
            $table->dropColumn('main_image_path');
        });
    }
}

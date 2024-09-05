<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsInBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {

            $table->string('address')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('driver_license_number')->nullable();
            $table->string('driver_license_state')->nullable();
            $table->string('driver_license_front_image')->nullable();
            $table->string('driver_license_back_image')->nullable();
            $table->string('proof_of_income')->nullable();
            $table->string('lead_from')->nullable();
          

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('driver_license_number');
            $table->dropColumn('driver_license_state');
            $table->dropColumn('lead_from');
            $table->dropColumn('driver_license_front_image');
            $table->dropColumn('driver_license_back_image');
            $table->dropColumn('proof_of_income');
        });
    }
}

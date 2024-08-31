<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLocationInBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['pickup_location', 'destination']);

            $table->foreignId('pickup_location_id')->constrained('locations')->onDelete('cascade');

            $table->foreignId('destination_location_id')->constrained('locations')->onDelete('cascade');


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
            $table->string('pickup_location');
            $table->string('destination');

            $table->dropForeign(['pickup_location_id']);
            $table->dropForeign(['destination_location_id']);
        });
    }
}

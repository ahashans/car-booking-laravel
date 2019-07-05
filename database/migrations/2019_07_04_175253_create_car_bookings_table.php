<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_bookings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->smallInteger('passenger_count');
            $table->unsignedInteger('booked_user_id');
            $table->unsignedInteger('car_id');
            $table->unsignedInteger('pickup_location_id');
            $table->unsignedInteger('destination_location_id');
            $table->dateTime('booking_time');
            $table->dateTime('return_time');
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
        Schema::dropIfExists('car_bookings');
    }
}

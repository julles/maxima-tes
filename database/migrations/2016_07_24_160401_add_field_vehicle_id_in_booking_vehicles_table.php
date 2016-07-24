<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldVehicleIdInBookingVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_vehicles', function (Blueprint $table) {
            $table->integer('vehicle_id')->unsigned();
            $table->foreign('vehicle_id')
                ->references('id')
                ->on('vehicles')
                ->onUpdate('cascade')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_vehicles', function (Blueprint $table) {
            $table->dropColumn('vehicle_id');
        });
    }
}

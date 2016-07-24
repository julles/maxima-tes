<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned(); //renter
            $table->string('origin')->index();
            $table->string('destination')->index();
            $table->enum('status',['pending','rejected','closed']);
            $table->timestamps();

             $table->foreign('user_id')
                ->references('id')
                ->on('users')
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
        Schema::drop('booking_vehicles');
    }
}

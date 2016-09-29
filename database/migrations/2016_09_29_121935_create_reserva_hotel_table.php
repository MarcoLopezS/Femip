<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservaHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reserva_hotel', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100);
            $table->string('direccion', 250);
            $table->integer('habitaciones');

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
        Schema::drop('reserva_hotel');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion_evento', function (Blueprint $table) {
            $table->increments('id');

            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100);
            $table->string('direccion', 250);
            $table->string('telefonos', 100);
            $table->boolean('primera_vez');
            $table->boolean('pertenece_asociacion');
            $table->string('nombre_asociacion', 250);

            $table->integer('evento_id');

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
        Schema::drop('inscripcion_evento');
    }
}

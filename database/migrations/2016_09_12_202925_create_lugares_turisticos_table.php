<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLugaresTuristicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lugares_turisticos', function (Blueprint $table)
        {
            $table->increments('id');

            $table->integer('evento_id');
            $table->string('titulo');
            $table->text('descripcion');
            $table->string('imagen', 150);
            $table->string('imagen_carpeta', 20);
            $table->integer('orden');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lugares_turisticos');
    }
}

<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscripcionContactoTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscripcion', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('asoc_nombre', 150);
            $table->string('asoc_pais', 30)->nullable();
            $table->string('asoc_zip', 50)->nullable();
            $table->string('asoc_direccion');
            $table->string('asoc_telefono')->nullable();
            $table->string('asoc_email', 50);
            $table->string('asoc_numero', 50);

            $table->string('rep_cargo', 100);
            $table->string('rep_nombre', 100);
            $table->string('rep_direccion');
            $table->string('rep_telefono')->nullable();
            $table->string('rep_email', 50);

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
        Schema::drop('inscripcion');
    }
}

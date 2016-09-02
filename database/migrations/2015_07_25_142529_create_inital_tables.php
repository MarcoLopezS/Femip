<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateInitalTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        /*===============================
        =            USUARIO            =
        ===============================*/

        Schema::create('users', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active');
            $table->string('code',60);

            $table->rememberToken();

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_profiles', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('nombres');
            $table->string('apellidos');

            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');

            $table->timestamps();
        });
        
        /*=====  End of USUARIO  ======*/

        /*================================
        =            NOTICIAS            =
        ==================================*/

        Schema::create('noticias', function(Blueprint $table)
        {
            $table->increments('id');
            
            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion')->nullable();;
            $table->text('contenido');
            $table->string('video')->nullable();;

            $table->boolean('publicar')->default(true);

            $table->integer('user_id')->nullable()->default(NULL);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('eventos', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');
            $table->text('contenido');

            $table->string('lugar');
            $table->string('fecha');

            $table->boolean('publicar')->default(false);
            $table->integer('user_id')->nullable()->default(NULL);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('galerias', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('slug_url');
            $table->string('descripcion');

            $table->boolean('publicar')->default(false);
            $table->integer('user_id')->nullable()->default(NULL);

            $table->timestamp('published_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('imagenes', function(Blueprint $table)
        {
            $table->increments('id');

            $table->morphs('imagenable');

            $table->string('titulo')->nullable();;
            $table->string('imagen')->nullable();;
            $table->string('imagen_carpeta')->nullable();;

            $table->integer('orden');

            $table->timestamps();
            $table->softDeletes();
        });

        /*=====  End of PRODUCTOS - CATEGORIAS - PROVEEDORES  ======*/

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('imagenes');
        Schema::drop('galerias');
        Schema::drop('eventos');
        Schema::drop('noticias');
        Schema::drop('user_profiles');
        Schema::drop('users');
	}

}
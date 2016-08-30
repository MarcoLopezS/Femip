<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('configurations', function(Blueprint $table)
        {
            $table->increments('id');

            $table->string('titulo');
            $table->string('dominio');
            $table->string('description');
            $table->text('keywords');
            $table->string('email');

            $table->integer('user_id')->nullable()->default(NULL);

            $table->text('history');

            $table->timestamps();
        });

        Schema::create('sliders', function(Blueprint $table)
        {
            $table->increments('id');

            $table->text('header');
            $table->text('body');
            $table->text('footer');

            $table->integer('user_id')->nullable()->default(NULL);

            $table->timestamps();
        });

        Schema::create('contacto_mensajes', function (Blueprint $table)
        {
            $table->increments('id');
            
            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->string('telefono');
            $table->boolean('telefono_whatsapp');
            $table->text('mensaje');
            $table->boolean('leido');
            $table->enum('type', ['contacto', 'sugerencia']);

            $table->integer('user_id')->nullable()->default(NULL);

            $table->text('history');

            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('social_media', function (Blueprint $table)
        {
            $table->increments('id');
            
            $table->string('facebook');
            $table->string('google');
            $table->string('pinterest');
            $table->string('skype');
            $table->string('tumblr');
            $table->string('twitter');
            $table->string('youtube');
            $table->string('whatsapp');

            $table->integer('user_id')->nullable()->default(NULL);

            $table->text('history');

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
        Schema::drop('social_media');
        Schema::drop('contacto_mensajes');
		Schema::drop('sliders');
        Schema::drop('configurations');
	}

}

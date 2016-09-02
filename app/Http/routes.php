<?php

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
Route::get('nosotros', ['as' => 'nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('mensaje-presidente', ['as' => 'nosotros.mensaje', 'uses' => 'FrontendController@nosotrosMensaje']);
Route::get('noticias', ['as' => 'noticias', 'uses' => 'FrontendController@noticias']);
Route::get('noticia/{id}-{url}', ['as' => 'noticias.select', 'uses' => 'FrontendController@noticiasSelect']);
Route::get('eventos', ['as' => 'eventos', 'uses' => 'FrontendController@eventos']);
Route::get('evento/{id}-{url}', ['as' => 'eventos.select', 'uses' => 'FrontendController@eventosSelect']);
Route::get('galerias', ['as' => 'galerias', 'uses' => 'FrontendController@galerias']);
Route::get('galeria/{id}-{url}', ['as' => 'galerias.select', 'uses' => 'FrontendController@galeriasSelect']);

//CAMBIAR ANCHO Y ALTO DE IMAGEN
Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);

//CAMBIAR ANCHO DE IMAGNE
Route::get('/upload/{folder}/{width}/{image}', ['as' => 'image.withResize', 'uses' => 'ImageController@withResize']);

Route::group(['namespace' => 'Auth'], function () {

    //LOGIN
    Route::get('login', ['as' => 'auth.login', 'uses' => 'AuthController@getLogin']);
    Route::post('login', ['as' => 'auth.login', 'uses' => 'AuthController@postLogin']);

    //LOGOUT
    Route::get('logout', ['as' => 'auth.logout', 'uses' => 'AuthController@logout']);
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'middleware' => ['auth']], function() {

    Route::get('/', ['as' => 'admin.home', 'uses' => 'HomeController@index']);

    //EMPRESA
    Route::group(['prefix' => 'company'], function(){

        //NOSOTROS
        Route::get('us', ['as' => 'admin.company.us.edit', 'uses' => 'CompanyController@usEdit']);
        Route::put('us', ['as' => 'admin.company.us.update', 'uses' => 'CompanyController@usUpdate']);

        //SOCIAL MEDIA
        Route::get('social', ['as' => 'admin.company.social.edit', 'uses' => 'CompanyController@socialEdit']);
        Route::put('social', ['as' => 'admin.company.social.update', 'uses' => 'CompanyController@socialUpdate']);

    });

    //SLIDER
    Route::resource('slider', 'SlidersController', ['only' => ['edit','update']]);

    //NOTICIAS
    Route::resource('noticias', 'NoticiasController');

    Route::group(['prefix' => 'noticias/images'], function(){
        Route::get('{noticia}', ['as' => 'admin.noticias.img.list', 'uses' => 'NoticiasController@photosList' ]);
        Route::post('{noticia}/order', ['as' => 'admin.noticias.img.order', 'uses' => 'NoticiasController@photosOrder' ]);
        Route::get('{noticia}/upload', ['as' => 'admin.noticias.img.create', 'uses' => 'NoticiasController@photosCreate' ]);
        Route::post('{noticia}/upload', ['as' => 'admin.noticias.img.store', 'uses' => 'NoticiasController@photosStore' ]);
        Route::delete('{noticia}/delete/{id}', ['as' => 'admin.noticias.img.delete', 'uses' => 'NoticiasController@photosDelete' ]);
    });

    //EVENTOS
    Route::resource('eventos', 'EventosController');

    Route::group(['prefix' => 'eventos/images'], function(){
        Route::get('{evento}', ['as' => 'admin.eventos.img.list', 'uses' => 'EventosController@photosList' ]);
        Route::post('{evento}/order', ['as' => 'admin.eventos.img.order', 'uses' => 'EventosController@photosOrder' ]);
        Route::get('{evento}/upload', ['as' => 'admin.eventos.img.create', 'uses' => 'EventosController@photosCreate' ]);
        Route::post('{evento}/upload', ['as' => 'admin.eventos.img.store', 'uses' => 'EventosController@photosStore' ]);
        Route::delete('{evento}/delete/{id}', ['as' => 'admin.eventos.img.delete', 'uses' => 'EventosController@photosDelete' ]);
    });

    //EVENTOS
    Route::resource('galerias', 'GaleriasController');

    Route::group(['prefix' => 'galerias/images'], function(){
        Route::get('{galeria}', ['as' => 'admin.galerias.img.list', 'uses' => 'GaleriasController@photosList' ]);
        Route::post('{galeria}/order', ['as' => 'admin.galerias.img.order', 'uses' => 'GaleriasController@photosOrder' ]);
        Route::get('{galeria}/upload', ['as' => 'admin.galerias.img.create', 'uses' => 'GaleriasController@photosCreate' ]);
        Route::post('{galeria}/upload', ['as' => 'admin.galerias.img.store', 'uses' => 'GaleriasController@photosStore' ]);
        Route::delete('{galeria}/delete/{id}', ['as' => 'admin.galerias.img.delete', 'uses' => 'GaleriasController@photosDelete' ]);
    });


    //CONFIGURACION
    Route::get('config', ['as' => 'admin.config', 'uses' => 'ConfigsController@edit']);
    Route::put('config', ['as' => 'admin.config.update', 'uses' => 'ConfigsController@update']);

    //USUARIOS
    Route::resource('user', 'UsersController');
    Route::post('user/{user}/password', ['as' => 'admin.user.updatePassword', 'uses' => 'UsersController@updatePassword']);

    //CONTACTO - MENSAJES
    Route::resource('contacto/mensajes', 'ContactoMensajesController', ['only' => ['index','show']]);
    Route::resource('contacto/sugerencias', 'ContactoSugerenciasController', ['only' => ['index','show']]);

});
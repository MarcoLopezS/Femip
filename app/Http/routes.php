<?php

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
Route::get('nosotros', ['as' => 'nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('mensaje-presidente', ['as' => 'nosotros.mensaje', 'uses' => 'FrontendController@nosotrosMensaje']);
Route::get('noticias', ['as' => 'noticias', 'uses' => 'FrontendController@noticias']);
Route::get('noticia/{id}-{url}', ['as' => 'noticias.select', 'uses' => 'FrontendController@noticiasSelect']);
Route::get('nota-prensa', ['as' => 'nota-prensa', 'uses' => 'FrontendController@prensa']);
Route::get('nota-prensa/{id}-{url}', ['as' => 'nota-prensa.select', 'uses' => 'FrontendController@prensaSelect']);
Route::get('eventos', ['as' => 'eventos', 'uses' => 'FrontendController@eventos']);
Route::get('evento/{id}-{url}', ['as' => 'eventos.select', 'uses' => 'FrontendController@eventosSelect']);
Route::get('galerias', ['as' => 'galerias', 'uses' => 'FrontendController@galerias']);
Route::get('galeria/{id}-{url}', ['as' => 'galerias.select', 'uses' => 'FrontendController@galeriasSelect']);
Route::get('enlaces', ['as' => 'enlaces', 'uses' => 'FrontendController@enlaces']);
Route::get('contacto', ['as' => 'contacto.get', 'uses' => 'FrontendController@contactoGet']);
Route::post('contacto', ['as' => 'contacto.post', 'uses' => 'FrontendController@contactoPost']);
Route::get('inscripcion', ['as' => 'inscripcion.get', 'uses' => 'FrontendController@inscripcionGet']);
Route::post('inscripcion', ['as' => 'inscripcion.post', 'uses' => 'FrontendController@inscripcionPost']);
Route::get('inscripcion-evento', ['as' => 'inscripcion-evento.get', 'uses' => 'FrontendController@inscripcionEventoGet']);
Route::post('inscripcion-evento', ['as' => 'inscripcion-evento.post', 'uses' => 'FrontendController@inscripcionEventoPost']);
Route::get('reserva-hotel', ['as' => 'reserva-hotel.get', 'uses' => 'FrontendController@reservaHotelGet']);
Route::post('reserva-hotel', ['as' => 'reserva-hotel.post', 'uses' => 'FrontendController@reservaHotelPost']);

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

    //NOTAS DE PRENSA
    Route::resource('nota-prensa', 'NotaPrensaController');

    Route::group(['prefix' => 'nota-prensa/images'], function(){
        Route::get('{nota}', ['as' => 'admin.nota-prensa.img.list', 'uses' => 'NotaPrensaController@photosList' ]);
        Route::post('{nota}/order', ['as' => 'admin.nota-prensa.img.order', 'uses' => 'NotaPrensaController@photosOrder' ]);
        Route::get('{nota}/upload', ['as' => 'admin.nota-prensa.img.create', 'uses' => 'NotaPrensaController@photosCreate' ]);
        Route::post('{nota}/upload', ['as' => 'admin.nota-prensa.img.store', 'uses' => 'NotaPrensaController@photosStore' ]);
        Route::delete('{nota}/delete/{id}', ['as' => 'admin.nota-prensa.img.delete', 'uses' => 'NotaPrensaController@photosDelete' ]);
    });

    //EVENTOS
    Route::resource('eventos', 'EventosController');

    Route::group(['prefix' => 'eventos/images'], function(){
        Route::get('{evento}', ['as' => 'admin.eventos.img.list', 'uses' => 'EventosController@photosList' ]);
        Route::post('{evento}/order', ['as' => 'admin.eventos.img.order', 'uses' => 'EventosController@photosOrder' ]);
        Route::get('{evento}/upload', ['as' => 'admin.eventos.img.create', 'uses' => 'EventosController@photosCreate' ]);
        Route::post('{evento}/upload', ['as' => 'admin.eventos.img.store', 'uses' => 'EventosController@photosStore' ]);
        Route::get('{evento}/edit/{id}', ['as' => 'admin.eventos.img.edit', 'uses' => 'EventosController@photosEdit' ]);
        Route::put('{evento}/edit/{id}', ['as' => 'admin.eventos.img.update', 'uses' => 'EventosController@photosUpdate' ]);
        Route::delete('{evento}/delete/{id}', ['as' => 'admin.eventos.img.delete', 'uses' => 'EventosController@photosDelete' ]);
    });

    Route::group(['prefix' => 'eventos/tour'], function(){
        Route::get('{evento}', ['as' => 'admin.eventos.tour.list', 'uses' => 'EventosController@tourList' ]);
        Route::post('{evento}/order', ['as' => 'admin.eventos.tour.order', 'uses' => 'EventosController@tourOrder' ]);
        Route::get('{evento}/upload', ['as' => 'admin.eventos.tour.create', 'uses' => 'EventosController@tourCreate' ]);
        Route::post('{evento}/upload', ['as' => 'admin.eventos.tour.store', 'uses' => 'EventosController@tourStore' ]);
        Route::get('{evento}/edit/{id}', ['as' => 'admin.eventos.tour.edit', 'uses' => 'EventosController@tourEdit' ]);
        Route::put('{evento}/edit/{id}', ['as' => 'admin.eventos.tour.update', 'uses' => 'EventosController@tourUpdate' ]);
        Route::delete('{evento}/delete/{id}', ['as' => 'admin.eventos.tour.delete', 'uses' => 'EventosController@tourDelete' ]);
    });

    //GALERIAS
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
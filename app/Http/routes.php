<?php

Route::get('/', ['as' => 'home', 'uses' => 'FrontendController@index']);
Route::get('nosotros', ['as' => 'nosotros', 'uses' => 'FrontendController@nosotros']);
Route::get('noticias', ['as' => 'noticias', 'uses' => 'FrontendController@noticias']);
Route::get('noticia/{id}-{url}', ['as' => 'noticias.select', 'uses' => 'FrontendController@noticiasSelect']);

Route::get('/upload/{folder}/{width}x{height}/{image}', ['as' => 'image.adaptiveResize', 'uses' => 'ImageController@adaptiveResize']);

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

    //PRODUCTOS
    Route::resource('noticias', 'NoticiasController');

    Route::group(['prefix' => 'noticias/images'], function(){
        Route::get('{noticia}', ['as' => 'admin.noticias.img.list', 'uses' => 'NoticiasController@photosList' ]);
        Route::post('{noticia}/order', ['as' => 'admin.noticias.img.order', 'uses' => 'NoticiasController@photosOrder' ]);
        Route::get('{noticia}/upload', ['as' => 'admin.noticias.img.create', 'uses' => 'NoticiasController@photosCreate' ]);
        Route::post('{noticia}/upload', ['as' => 'admin.noticias.img.store', 'uses' => 'NoticiasController@photosStore' ]);
        Route::delete('{noticia}/delete/{id}', ['as' => 'admin.noticias.img.delete', 'uses' => 'NoticiasController@photosDelete' ]);
    });

    //GALERIA
    Route::group(['prefix' => 'gallery'], function(){

        //GALERIA DE VIDEOS
        Route::resource('video', 'GalleryVideosController');
        Route::get('video-deletes', ['as' => 'admin.gallery.video.listsDeletes', 'uses' => 'GalleryVideosController@listsDeletes']);
        Route::delete('video-deletes/destroy/{id}', ['as' => 'admin.gallery.video.listsDeletes.destroy', 'uses' => 'GalleryVideosController@destroyTotal']);
        Route::post('video-deletes/restore/{id}', ['as' => 'admin.gallery.video.listsDeletes.restore', 'uses' => 'GalleryVideosController@restore']);
        Route::post('video/url', ['as' => 'admin.gallery.video.slugUrl', 'uses' => 'GalleryVideosController@slugUrl']);

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
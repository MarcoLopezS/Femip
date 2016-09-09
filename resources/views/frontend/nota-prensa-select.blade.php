@extends('layouts.frontend')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_imagen = $row->imagen_noticia_select;
    $row_descripcion = $row->descripcion;
    $row_contenido = $row->contenido;
    $row_fecha_dia = $row->fecha_dia;
    $row_fecha_mes = $row->fecha_mes;
    $row_fecha_anio = $row->fecha_anio;
@endphp

@section('contenido_header')
    {{-- Open Graph --}}
    <meta property="og:title" content='{{ $row_titulo  }}'>
    <meta property="og:type" content='article' >
    <meta property="og:url" content='{{ $row_url }}' >
    <meta property="og:image" content='{{ $row_imagen }}' >
    <meta property="og:site_name" content='' >
    <meta property="fb:admins" content='610468802466436'>
    <meta property="og:description" content='{{ $row_descripcion }}'>
@endsection

@section('contenido_body')

    <section class="page-header page-header-color page-header-primary page-header-more-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb">
                        <li class="active">Nota de Prensa</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h1>{{ $row_titulo }}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="blog-posts single-post">

                    <article class="post post-large blog-single-post">
                        <div class="post-image">
                            <img class="img-responsive" src="{{ $row_imagen }}" alt="">
                        </div>

                        <div class="post-date">
                            <span class="day">{{ $row_fecha_dia }}</span>
                            <span class="month">{{ $row_fecha_mes }}</span>
                            <span class="month">{{ $row_fecha_anio }}</span>
                        </div>

                        <div class="post-content">

                            <div style="text-align: justify;">
                                {!! $row_contenido !!}
                            </div>

                            <div class="post-block post-share">
                                <h3 class="heading-primary"><i class="fa fa-share"></i>Compartir noticia</h3>

                                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                                <div class="addthis_inline_share_toolbox"></div>

                            </div>

                        </div>
                    </article>

                </div>
            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
@endsection
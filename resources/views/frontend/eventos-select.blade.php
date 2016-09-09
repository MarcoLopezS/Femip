@extends('layouts.frontend')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_imagen = $row->imagen_evento_select;
    $row_imagen_titulo = $row->imagen_evento_select_titulo;
    $row_descripcion = $row->descripcion;
    $row_contenido = $row->contenido;
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
                        <li class="active">Evento</li>
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
            <div class="col-md-4 center">
                <img alt="{{ $row_titulo }}" class="img-responsive" src="{{ $row_imagen }}">
                <h5>{{ $row_imagen_titulo }}</h5>
            </div>

            <div class="col-md-8">
                {!! $row_contenido !!}
            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
@endsection
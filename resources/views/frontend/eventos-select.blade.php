@extends('layouts.frontend')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_imagen = $row->imagen_evento_select;
    $row_descripcion = $row->descripcion;
    $row_contenido = $row->contenido;
@endphp

@section('contenido_header')
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
            <div class="col-md-4">
                <img alt="{{ $row_titulo }}" class="img-responsive" src="{{ $row_imagen }}">
            </div>

            <div class="col-md-8">

                <h5 class="mt-sm">Descripción</h5>
                {!! $row_contenido !!}

            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
@endsection
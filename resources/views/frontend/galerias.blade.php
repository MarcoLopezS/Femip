@extends('layouts.frontend')

@section('titulo')
    Galerías | @parent
@endsection

@section('contenido_header')
@endsection

@section('contenido_body')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Galería de Fotos</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">

            <div class="">
                <ul class="portfolio-list" data-sort-id="portfolio">

                    @foreach($rows as $row)
                        @php
                            $row_titulo = $row->titulo;
                            $row_url = $row->url;
                            $row_imagen = $row->imagen_galeria_list;
                            $row_descripcion = $row->descripcion;
                            $row_lugar = $row->lugar;
                            $row_fecha = $row->fecha;
                        @endphp
                    <li class="col-md-6">
                        <div class="portfolio-item">
                            <a href="{{ $row_url }}">
                                <span class="thumb-info thumb-info-lighten thumb-info-no-zoom">
                                    <span class="thumb-info-wrapper">
                                        <img src="{{ $row_imagen }}" class="img-responsive" alt="{{ $row_titulo }}">
                                        <span class="thumb-info-title">
                                            <span class="thumb-info-inner">{{ $row_titulo }}</span>
                                            <span class="thumb-info-inner lugar">{{ $row_lugar }}</span>
                                        </span>
                                        <span class="thumb-info-type">{{ $row_fecha }}</span>
                                        <span class="thumb-info-action">
                                            <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </div>
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
@endsection
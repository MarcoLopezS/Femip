@extends('layouts.frontend')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_imagen = $row->imagen_galeria_select;
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
                        <li class="active">Galería de Fotos</li>
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

            <div class="masonry lightbox" data-plugin-masonry data-plugin-options='{"itemSelector": ".masonry-item", "delegate": "a", "type": "image", "gallery": {"enabled": true}, "mainClass": "mfp-with-zoom", "zoom": {"enabled": true, "duration": 300}}'>
                @foreach($row->imagenes as $foto)
                    @php
                        $imagen = $foto->imagen_galeria;
                        $imagen_o = $foto->imagen_final;
                    @endphp
                    <div class="masonry-item col-md-3 col-sm-6 col-xs-12">
                        <a href="{{ $imagen_o }}">
                            <span class="thumb-info thumb-info-centered-info thumb-info-no-borders">
                                <span class="thumb-info-wrapper">
                                    <img src="{{ $imagen }}" class="img-responsive img-row" alt="">
                                    <span class="thumb-info-action">
                                        <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                                    </span>
                                </span>
                            </span>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jquery.lazyload/1.9.1/jquery.lazyload.min.js') !!}

    <script>
        $(document).on("ready", function() {
            $("img.img-row").lazyload({
                effect: "fadeIn",
                threshold : 20
            });
        });
    </script>
@endsection
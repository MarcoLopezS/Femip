@extends('layouts.frontend')

@php
    $row_titulo = $row->titulo;
    $row_url = $row->url;
    $row_imagen = $row->imagen_evento_select;
    $row_imagen_titulo = $row->imagen_evento_select_titulo;
    $row_descripcion = $row->descripcion;
    $row_contenido = $row->contenido;
@endphp

@section('titulo')
    {{ $row_titulo }} | @parent
@endsection

@section('contenido_header')
    {{-- Open Graph --}}
    <meta property="og:title" content='{{ $row_titulo  }}'>
    <meta property="og:type" content='article' >
    <meta property="og:url" content='{{ $row_url }}' >
    <meta property="og:image" content='{{ $row_imagen }}' >
    <meta property="og:site_name" content='' >
    <meta property="fb:admins" content='610468802466436'>
    <meta property="og:description" content='{{ $row_descripcion }}'>

    {{-- FancyBox --}}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.css') !!}
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
                <div class="heading heading-border heading-middle-border">
                    <h5><strong>{{ $row_imagen_titulo }}</strong></h5>
                </div>

                @if($row->tour()->count() > 0)
                    <div class="col-12">
                        <div class="heading heading-border heading-bottom-double-border">
                            <h5><strong>Lugares Turísticos</strong></h5>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="portfolio-list">
                            @foreach($row->tour as $tour)
                                @php
                                    $tour_titulo = $tour->titulo.": ".$tour->descripcion;
                                    $tour_imagen = $tour->imagen_select;
                                    $tour_imagen_th = $tour->imagen_select_th;
                                @endphp
                            <li class="col-md-4">
                                <div class="portfolio-item">
                                    <a rel="gallery" title="{{ $tour_titulo }}" class="fancybox" href="{{ $tour_imagen }}">
                                        <span class="thumb-info thumb-info-lighten">
                                            <span class="thumb-info-wrapper">
                                                <img src="{{ $tour_imagen_th }}" class="img-responsive" alt="{{ $tour_titulo }}">
                                                <span class="thumb-info-action">
                                                    <span class="thumb-info-action-icon"><i class="fa fa-picture-o"></i></span>
                                                </span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>

            <div class="col-md-8">
                {!! $row_contenido !!}
            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
    {{-- FancyBox --}}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js') !!}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-buttons.js') !!}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-media.js') !!}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/helpers/jquery.fancybox-thumbs.js') !!}
    <script>
        $(document).on("ready", function() {
            $(".fancybox").fancybox({
                afterShow: function() {
                    $(".fancybox-title").wrapInner('<div />').show();
                },
                helpers : {
                    title: {
                        type: 'over'
                    }
                }
            });
        });
    </script>
@endsection
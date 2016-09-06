@extends('layouts.frontend')

@section('contenido_header')
@endsection

@section('contenido_body')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Notas de Prensa</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="blog-posts">

                    @foreach($rows as $row)
                        @php
                            $row_titulo = $row->titulo;
                            $row_url = $row->url;
                            $row_imagen = $row->imagen_noticia_list;
                            $row_descripcion = $row->descripcion;
                            $row_fecha = $row->fecha;
                        @endphp
                    <article class="post post-medium">
                        <div class="row">

                            @if($row_imagen <> "")
                            <div class="col-md-5">
                                <div class="post-image">
                                    <div class="owl-carousel owl-theme" data-plugin-options='{"items":1}'>
                                        <div>
                                            <div class="img-thumbnail">
                                                <img class="img-responsive" src="{{ $row_imagen }}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div {!! $row_imagen == "" ? 'class="col-md-12"' : 'class="col-md-7"' !!} >
                                <div class="post-content">
                                    <h2><a href="{{ $row_url }}">{{ $row_titulo }}</a></h2>
                                    <p>{{ $row_descripcion }}</p>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="post-meta">
                                    <span><i class="fa fa-calendar"></i> {{ $row_fecha }}</span>
                                    <a href="{{ $row_url }}" class="btn btn-xs btn-primary pull-right">Seguir leyendo...</a>
                                </div>
                            </div>
                        </div>

                    </article>
                    @endforeach

                    {!! $rows->appends(Request::all())->render() !!}

                </div>
            </div>
        </div>

    </div>

@endsection

@section('contenido_footer')
@endsection
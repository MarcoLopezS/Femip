@extends('layouts.frontend')

@section('contenido_header')

    {!! $slider->header !!}

@endsection

@section('contenido_body')

    {!! $slider->body !!}

    <section class="section section-no-background m-none">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-responsive mb-lg" src="/imagenes/logo.png" alt="Office">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-lg"><strong>Federación Mundial de Instituciones Peruanas</strong></h2>
                    <p class="lead" style="text-align:justify;">El objetivo más importante de las convenciones de la FEMIP, son las conferencias, donde se tratan temas de vital importancia para nuestra comunidad peruana residente en el extranjero y por ende afecta a sus familiares que viven en el Perú.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-none section-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 center">
                    <h2>Últimas<strong> Noticias</strong></h2>
                </div>
            </div>
            <div class="row mt-lg">

                @foreach($noticias as $row)
                    @php
                        $row_titulo = $row->titulo;
                        $row_url = $row->url;
                        $row_imagen = $row->imagen_noticia_home;
                        $row_descripcion = $row->descripcion;
                        $row_fecha = $row->fecha;
                    @endphp
                <div class="col-md-3">
                    <img class="img-responsive" src="{{ $row_imagen }}" alt="{{ $row_titulo }}">
                    <div class="recent-posts mt-md mb-lg">
                        <article class="post">
                            <h5><a class="text-dark" href="{{ $row_url }}">{{ $row_titulo }}</a></h5>
                            <p>{{ $row_descripcion }}</p>
                            <div class="post-meta">
                                <span><i class="fa fa-calendar"></i>{{ $row_fecha }}</span>
                            </div>
                        </article>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>

    <div class="modal fade" id="modal-popup" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" style="width: 780px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                </div>
                <div class="modal-body">
                    <img src="/imagenes/navidad.jpg" alt="Feliz Navidad">
                </div>
            </div>
        </div>
    </div>

@endsection


@section('contenido_footer')

    {!! $slider->footer !!}

    <script>
        $('#modal-popup').on('shown.bs.modal', function () {
            $("#txtname").focus();
        });

        $('#modal-popup').modal({
            show: true
        });
    </script>

@stop
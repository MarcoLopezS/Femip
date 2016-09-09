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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></button>
                    <h4 class="modal-title" id="defaultModalLabel">
                        <img alt="Femip" height="60" src="/imagenes/logo.png">
                    </h4>
                </div>
                <div class="modal-body">
                    <p>En nombre de la <strong>Federaci&oacute;n Mundial de Instituciones Peruanas &ndash; FEMIP</strong>, entidad que me honro en presidir, los invitamos cordialmente a nuestra pr&oacute;xima <strong>VII Convenci&oacute;n</strong>, que se realizar&aacute; los d&iacute;as 4, 5 y 6 de noviembre 2016 en las instalaciones del Hotel Resort Costa Vista en &nbsp;Okinawa - Jap&oacute;n.</p>

                    <p>Los temas que se tratar&aacute;n en las Conferencias ser&aacute;n: el Proyecto de Ley sobre la Creaci&oacute;n del Distrito Electoral en el Extranjero, el Medio Ambiente y otros temas de inter&eacute;s para la comunidad peruana.</p>

                    <p>Les reitero est&aacute; cordial invitaci&oacute;n para que participen en nuestro evento, vuestra presencia es de suma importancia.</p>

                    <p>Acompa&ntilde;amos y no pierdan esta oportunidad de tambi&eacute;n hacer turismo en el pa&iacute;s del Sol naciente.&nbsp; Tenemos un programa tur&iacute;stico y de atracciones muy interesante para complementarlos con la Convenci&oacute;n.</p>

                    <p>Julio A. Salazar<br />
                        Presidente</p>

                    <h5 style="text-align:center"><strong>¡VIVA EL PERU!</strong></h5>
                    <h5 style="text-align:center"><strong>¡VIVA EL QUINTO SUYO!</strong></h5>
                    <h4 style="text-align:center"><strong>¡NOS VEMOS EN OKINAWA!</strong></h4>
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
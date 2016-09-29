@extends('layouts.frontend')

@section('titulo')
    Reserva de Hotel | @parent
@endsection

@section('contenido_header')
@endsection

@section('contenido_body')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Reserva de Hotel</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <aside style="text-align:center;" class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options='{"minWidth": 991, "containerSelector": ".container", "padding": {"top": 110}}'>
                    <h2 class="mb-sm"><strong>RESORT COSTA VISTA OKINAWA HOTEL & SPA</strong></h2>
                    <h3 class="mb-sm">Teléfono: 081-989351500</h3>
                    <h4 class="mb-xlg">901-2311 Okinawa, Kitanakagusuku, Kishaba 1478, Japón</h4>

                    <div class="pricing-table princig-table-flat">
                        <div class="col-md-12 col-sm-12">
                            <div class="plan">
                                <h3>
                                    Habitaciones dobles
                                    <span class="mb-sm mt-sm">US$ 150</span>
                                    la noche (2 personas)
                                </h3>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>

            <div class="col-md-7">

                <div class="row">

                    <div id="mensaje-enviado" style="display: none;height:400px;">

                        <div class="block-header" style="padding-top: 0;">
                            <h2>Los datos han sido enviados.</h2>
                            <p class="lead">Muchas gracias por inscribirse.</p>
                        </div>

                    </div>

                    {!! Form::open(['route' => 'reserva-hotel.post', 'method' => 'post', 'id' => 'inscripcionForm', 'class' => 'form-horizontal form-bordered']) !!}

                        <div class="form-group">
                            <label class="col-md-4 control-label">Nombres :</label>
                            <div class="col-md-6">
                                {!! Form::text('nombres', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Apellidos :</label>
                            <div class="col-md-6">
                                {!! Form::text('apellidos', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email :</label>
                            <div class="col-md-6">
                                {!! Form::email('email', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Dirección Postal :</label>
                            <div class="col-md-6">
                                {!! Form::text('direccion', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Habitaciones :</label>
                            <div class="col-md-2">
                                {!! Form::number('habitaciones', 1, ['class' => 'form-control', 'required', 'min' => '1']) !!}
                            </div>
                        </div>

                        <div class="form-content"></div>

                        <div class="col-md-12">
                            <a id="formInscripcionSubmit" href="#" class="btn btn-primary btn-lg mb-xlg">Enviar Datos</a>

                            <div class="progressForm col-xs-6">
                                <i class="fa fa-2x fa-circle-o-notch fa-spin" style="display:none;"></i>
                            </div>
                        </div>

                    {!! Form::close() !!}
                </div>

            </div>

        </div>

    </div>

@endsection

@section('contenido_footer')

    <script>
        $(document).on("ready", function(){

            $("#formInscripcionSubmit").on("click", function(e){

                e.preventDefault();

                var form = $("#inscripcionForm");
                var url = form.attr('action');
                var data = form.serialize();

                $.ajax({
                    url: url,
                    type: 'POST',
                    data: data,
                    beforeSend: function () { $('.progressForm .fa').show(); },
                    complete: function () { $('.progressForm .fa').hide(); },
                    success: function (result) {
                        form.slideUp();
                        $('#mensaje-enviado').slideDown();
                        form[0].reset();
                    },
                    error: function (result) {
                        if(result.status === 422){
                            var errors = result.responseJSON;
                            var errorsHtml = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><ul>';
                            $.each( errors, function( key, value ) {
                                errorsHtml += '<li>' + value[0] + '</li>';
                            });
                            errorsHtml += '</ul></div>';
                            $('.form-content').html(errorsHtml);
                        }else{
                            errorsHtml = '<div class="alert alert-danger"><button class="close" data-close="alert"></button><ul>';
                            errorsHtml += '<li>Se ha producido un error. Intentelo de nuevo.</li>';
                            errorsHtml += '</ul></div>';
                            $('.form-content').html(errorsHtml);
                        }
                    }
                });
            });

        });
    </script>
@endsection
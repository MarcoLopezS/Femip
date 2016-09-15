@extends('layouts.frontend')

@section('contenido_header')
@endsection

@section('contenido_body')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Inscripción</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">

            <div class="col-md-5">
                <aside class="sidebar" id="sidebar" data-plugin-sticky data-plugin-options='{"minWidth": 991, "containerSelector": ".container", "padding": {"top": 110}}'>
                    <h2><strong>Inscripción</strong></h2>
                    <p style="text-align:justify;" class="lead">En mi condición de Presidente de la FEMIP, deseo invitar a usted y por su intermedio a la Institución que representa a que forme parte nuestra.</p>
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

                    {!! Form::open(['route' => 'inscripcion.post', 'method' => 'post', 'id' => 'inscripcionForm', 'class' => 'form-horizontal form-bordered']) !!}

                        <div class="heading heading-border heading-middle-border heading-middle-border-center">
                            <h3><strong>Datos de la Asociación</strong></h3>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre :</label>
                            <div class="col-md-6">
                                {!! Form::text('asoc_nombre', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">País :</label>
                            <div class="col-md-6">
                                {!! Form::text('asoc_pais', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">ZIP / Código Postal :</label>
                            <div class="col-md-6">
                                {!! Form::text('asoc_zip', null, ['class' => 'form-control', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Dirección :</label>
                            <div class="col-md-6">
                                {!! Form::text('asoc_direccion', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Teléfono(s) :</label>
                            <div class="col-md-6">
                                {!! Form::text('asoc_telefono', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email :</label>
                            <div class="col-md-6">
                                {!! Form::email('asoc_email', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Número de Asociados:</label>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-sm-4">
                                        {!! Form::number('asoc_numero', 1, ['class' => 'form-control', 'min' => '1']) !!}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="heading heading-border heading-middle-border heading-middle-border-center">
                            <h3><strong>Datos del Representante de la Asociación</strong></h3>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Cargo :</label>
                            <div class="col-md-6">
                                {!! Form::text('rep_cargo', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Nombre completo:</label>
                            <div class="col-md-6">
                                {!! Form::text('rep_nombre', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Dirección :</label>
                            <div class="col-md-6">
                                {!! Form::text('rep_direccion', null, ['class' => 'form-control', 'required']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Teléfono(s) :</label>
                            <div class="col-md-6">
                                {!! Form::text('rep_telefono', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-3 control-label">Email :</label>
                            <div class="col-md-6">
                                {!! Form::email('rep_email', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
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
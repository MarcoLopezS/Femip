@extends('layouts.frontend')

@section('contenido_header')
@endsection

@section('contenido_body')

    <section class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Contacto</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container">

        <div class="row">
            <div class="col-md-6">

                <div id="mensaje-enviado" style="display: none;height:400px;">

                    <div class="block-header" style="padding-top: 0;">
                        <h2>Tu mensaje ha sido enviado.</h2>
                        <p class="lead">Muchas gracias por contactarse con nosotros.</p>
                    </div>

                </div>

                <div class="form-content"></div>

                {!! Form::open(['route' => 'contacto.post', 'method' => 'post', 'id' => 'contactForm']) !!}

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-6">
                                <label>Nombre *</label>
                                {!! Form::text('nombre', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                            <div class="col-md-6">
                                <label>Apellidos *</label>
                                {!! Form::text('apellidos', null, ['class' => 'form-control', 'required', 'maxlength' => '100']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Email *</label>
                                {!! Form::email('email', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Mensaje *</label>
                                {!! Form::textarea('mensaje', null, ['class' => 'form-control', 'rows' => '10']) !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <a id="formContactoSubmit" href="#" class="btn btn-primary btn-lg mb-xlg">Enviar mensaje</a>

                            <div class="progressForm col-xs-6">
                                <i class="fa fa-2x fa-circle-o-notch fa-spin" style="display:none;"></i>
                            </div>
                        </div>
                    </div>

                {!! Form::close() !!}

            </div>

            <div class="col-md-6">

                <h4 class="heading-primary"><strong>Datos</strong></h4>
                <ul class="list list-icons list-icons-style-3 mt-xlg">
                    {{--<li><i class="fa fa-map-marker"></i> <strong>Address:</strong> 1234 Street Name, City Name, United States</li>--}}
                    {{--<li><i class="fa fa-phone"></i> <strong>Phone:</strong> (123) 456-789</li>--}}
                    <li><i class="fa fa-envelope"></i> <strong>Email:</strong> <a href="mailto:femip@femip.org">femip@femip.org</a></li>
                </ul>

            </div>

        </div>

    </div>

@endsection

@section('contenido_footer')

    <script>
        $(document).on("ready", function(){

            $('.progressForm .fa').hide();

            $("#formContactoSubmit").on("click", function(e){

                e.preventDefault();

                var form = $("#contactForm");
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
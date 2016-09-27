<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>
        @section('titulo')
            Federación Mundial de Instituciones Peruanas - FEMIP
        @show
    </title>

    <meta name="keywords" content="femip, federacion, mundial, instituciones, peruanas, peruanes, extranjero, convenciones, convencion, japon, julio salazar" />
    <meta name="description" content="Federación Mundial de Instituciones Peruanas">
    <meta name="robots" content="index, follow">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <!-- Web Fonts  -->
    {!! HTML::style('https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light') !!}

    <!-- Vendor CSS -->
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') !!}
    {!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.3.2/css/simple-line-icons.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css') !!}
    {!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css') !!}

            <!-- Theme CSS -->
    {!! HTML::style('css/theme.css') !!}
    {!! HTML::style('css/theme-elements.css') !!}
    {!! HTML::style('css/theme-blog.css') !!}
    {!! HTML::style('css/theme-shop.css') !!}
    {!! HTML::style('css/theme-animate.css') !!}

    <!-- Current Page CSS -->
    {!! HTML::style('vendor/rs-plugin/css/settings.css') !!}
    {!! HTML::style('vendor/rs-plugin/css/layers.css') !!}
    {!! HTML::style('vendor/rs-plugin/css/navigation.css') !!}
    {!! HTML::style('vendor/circle-flip-slideshow/css/component.css') !!}

    <!-- Skin CSS -->
    {!! HTML::style('css/skins/default.css') !!}

    <!-- Theme Custom CSS -->
    {!! HTML::style('css/estilos.css') !!}

    <!-- Head Libs -->
    {!! HTML::script('vendor/modernizr/modernizr.min.js') !!}

    <!-- Go to www.addthis.com/dashboard to customize your tools -->
    {!! HTML::script('//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-57c4f218c6246292') !!}

    @yield('contenido_header')
    
</head>
<body>

    <div class="body">
        <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 140, "stickySetTop": "-140px"}'>
            <div class="header-body">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column header-column-center">
                            <div class="header-logo">
                                <a href="/">
                                    <img alt="Femip" width="235" height="80" data-sticky-width="162" data-sticky-height="55" data-sticky-top="38" src="/imagenes/logo.png">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-container container header-nav header-nav-center">
                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                        <nav>
                            <ul class="nav nav-pills" id="mainNav">
                                <li {!! (Request::is('/') ? 'class="active"' : '') !!}><a href="/">Inicio</a></li>
                                <li {!! (Request::is('nosotros*') ? 'class="dropdown active"' : 'class="dropdown"') !!}>
                                    <a class="dropdown-toggle" href="#">Nosotros</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/nosotros">¿Quiénes somos?</a></li>
                                        <li><a href="/mensaje-presidente">Mensaje del Presidente</a></li>
                                    </ul>
                                </li>
                                <li {!! (Request::is('inscripcion') ? 'class="active"' : '') !!}><a href="/inscripcion">Inscripción</a></li>
                                <li {!! (Request::is('evento*') ? 'class="active"' : '') !!}><a href="/eventos">Eventos</a></li>
                                <li {!! (Request::is('nota*') ? 'class="active"' : '') !!}><a href="/nota-prensa">Notas de Prensa</a></li>
                                <li {!! (Request::is('noticia*') ? 'class="active"' : '') !!}><a href="/noticias">Noticias</a></li>
                                <li {!! (Request::is('galeria*') ? 'class="active"' : '') !!}><a href="/galerias">Galería de Fotos</a></li>
                                <li {!! (Request::is('enlace*') ? 'class="active"' : '') !!}><a href="/enlaces">Enlaces</a></li>
                                <li {!! (Request::is('contacto*') ? 'class="active"' : '') !!}><a href="/contacto">Contacto</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <div role="main" class="main">
            @yield('contenido_body')
        </div>

        <footer id="footer" class="color color-primary">
            <div class="footer-copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2">
                            <p>© Copyright 2016.</p>
                        </div>
                        <div class="col-md-10">
                            <nav id="sub-menu">
                                <ul>
                                    <li><a href="/">Inicio</a></li>
                                    <li><a href="/nosotros">¿Quiénes somos?</a></li>
                                    <li><a href="/mensaje-presidente">Mensaje del Presidente</a></li>
                                    <li><a href="/inscripcion">Inscripción</a></li>
                                    <li><a href="/eventos">Eventos</a></li>
                                    <li><a href="/nota-prensa">Notas de Prensa</a></li>
                                    <li><a href="/noticias">Noticias</a></li>
                                    <li><a href="/galerias">Galería de Fotos</a></li>
                                    <li><a href="/enlaces">Enlaces</a></li>
                                    <li><a href="/contacto">Contacto</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>

    <!-- Vendor -->
    {!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js') !!}
    {!! HTML::script('vendor/jquery.appear/jquery.appear.min.js') !!}
    {!! HTML::script('vendor/jquery.easing/jquery.easing.min.js') !!}
    {!! HTML::script('vendor/jquery-cookie/jquery-cookie.min.js') !!}
    {!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}
    {!! HTML::script('vendor/common/common.min.js') !!}
    {!! HTML::script('vendor/isotope/jquery.isotope.min.js') !!}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js') !!}
    {!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js') !!}
    {!! HTML::script('vendor/vide/vide.min.js') !!}

            <!-- Theme Base, Components and Settings -->
    {!! HTML::script('js/theme.js') !!}

            <!-- Current Page Vendor and Views -->
    {!! HTML::script('vendor/rs-plugin/js/jquery.themepunch.tools.min.js') !!}
    {!! HTML::script('vendor/rs-plugin/js/jquery.themepunch.revolution.min.js') !!}
    {!! HTML::script('vendor/circle-flip-slideshow/js/jquery.flipshow.min.js') !!}
    {!! HTML::script('js/views/view.home.js') !!}

            <!-- Theme Initialization Files -->
    {!! HTML::script('js/theme.init.js') !!}

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-20229980-15', 'auto');
        ga('send', 'pageview');

    </script>

    @yield('contenido_footer')

</body>
</html>
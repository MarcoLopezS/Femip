<!DOCTYPE html>
<html>
<head>

    <!-- Basic -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Federación Mundial de Instituciones Peruanas - FEMIP</title>

    <meta name="keywords" content="femip, federacion, mundial, instituciones, peruanas, peruanes, extranjero, convenciones, convencion, japon, julio salazar" />
    <meta name="description" content="Federación Mundial de Instituciones Peruanas">

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

    @yield('contenido_header')
    
</head>
<body>

    <div class="body">
        <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
            <div class="header-body">
                <div class="header-container container">
                    <div class="header-row">
                        <div class="header-column">
                            <div class="header-logo">
                                <a href="index.html">
                                    <img alt="Femip" width="235" height="80" data-sticky-width="162" data-sticky-height="55" data-sticky-top="38" src="imagenes/logo.png">
                                </a>
                            </div>
                        </div>
                        <div class="header-column">
                            <div class="header-row">
                                <div class="header-nav header-nav-stripe">
                                    <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                        <i class="fa fa-bars"></i>
                                    </button>
                                    <ul class="header-social-icons social-icons hidden-xs">
                                        <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                    </ul>
                                    <div class="header-nav-main header-nav-main-square header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                        <nav>
                                            <ul class="nav nav-pills" id="mainNav">
                                                <li class="active"><a href="overview.html">Inicio</a></li>
                                                <li class=""><a href="overview.html">¿Quiénes somos?</a></li>
                                                <li class=""><a href="overview.html">Noticias</a></li>
                                                <li class=""><a href="overview.html">Eventos</a></li>
                                                <li class=""><a href="overview.html">Galería de Fotos</a></li>
                                                <li class=""><a href="overview.html">Enlaces</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                        <div class="col-md-4">
                            <p>© Copyright 2016. Todos los derechos reservados.</p>
                        </div>
                        <div class="col-md-8">
                            <nav id="sub-menu">
                                <ul>
                                    <li><a href="#">Inicio</a></li>
                                    <li><a href="#">¿Quiénes somos?</a></li>
                                    <li><a href="#">Noticias</a></li>
                                    <li><a href="#">Eventos</a></li>
                                    <li><a href="#">Galería de Fotos</a></li>
                                    <li><a href="#">Enlaces</a></li>
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
    {!! HTML::script('vendor/jquery.validation/jquery.validation.min.js') !!}
    {!! HTML::script('vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js') !!}
    {!! HTML::script('vendor/jquery.gmap/jquery.gmap.min.js') !!}
    {!! HTML::script('vendor/jquery.lazyload/jquery.lazyload.min.js') !!}
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

            <!-- Theme Custom -->
    {!! HTML::script('js/custom.js') !!}

            <!-- Theme Initialization Files -->
    {!! HTML::script('js/theme.init.js') !!}

    @yield('contenido_footer')

</body>
</html>
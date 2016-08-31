@extends('layouts.frontend')

@section('contenido_header')

    <!-- LOAD JQUERY LIBRARY -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.js"></script>

    <!-- LOADING FONTS AND ICONS -->
    <link href="http://fonts.googleapis.com/css?family=Raleway:500,800" rel="stylesheet" property="stylesheet" type="text/css" media="all" /><link href="http://fonts.googleapis.com/css?family=Raleway:800,500" rel="stylesheet" property="stylesheet" type="text/css" media="all" />

    <link rel="stylesheet" type="text/css" href="fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">

    <!-- REVOLUTION STYLE SHEETS -->
    <link rel="stylesheet" type="text/css" href="css/settings.css">
    <!-- REVOLUTION LAYERS STYLES -->
    <style>.tp-caption.NotGeneric-Title,.NotGeneric-Title{color:rgba(255,255,255,1.00);font-size:70px;line-height:70px;font-weight:800;font-style:normal;font-family:Raleway;padding:10px 0px 10px 0;text-decoration:none;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0 0 0 0px}.tp-caption.NotGeneric-SubTitle,.NotGeneric-SubTitle{color:rgba(255,255,255,1.00);font-size:13px;line-height:20px;font-weight:500;font-style:normal;font-family:Raleway;padding:0 0 0 0px;text-decoration:none;background-color:transparent;border-color:transparent;border-style:none;border-width:0px;border-radius:0 0 0 0px;letter-spacing:4px;text-align:left}</style>
    <style type="text/css">.button-down-slider a{color:#fff}.tp-caption.whitedivider3px{color:#000000;text-shadow:none;background-color:rgb(44,159,92);background-color:rgba(44,159,92,1);text-decoration:none;font-size:0px;line-height:0;min-width:656px;min-height:4px;border-width:0px;border-color:rgb(0,0,0);border-style:none}.tp-caption.store_button_full_black a,.tp-caption.store_button_full a{position:absolute; color:#fff; text-shadow:none; font-size:14px; line-height:18px !important; font-family:"Montserrat";padding:25px 40px 25px 40px !important;margin:0px;  cursor:pointer;   background:none;  border-radius:30px; height:0px;   background:#2C9F5C;   background-color:rgb(44,159,92);  background-color:rgba(44,159,92,0.8); text-transform:uppercase}.tp-caption.store_button_full a{background:#2C9F5C;  border:none; background-color:rgb(44,159,92); background-color:rgba(44,159,92,0.8); color:#fff !important}.tp-caption.store_button_full_black a{background:#121212;  background-color:rgb(18,18,18); background-color:rgba(18,18,18,0.9);  border:none; color:#fff !important}.tp-caption.store_button_full_black a,.tp-caption.store_button_full a{line-height:0px !important}.tp-caption.store_button a:hover,.tp-caption.store_button_full a:hover{background:#2C9F5C !important}.tp-caption.store_button_full_black a:hover{background:#121212}.tp-caption.pmc-button{border-bottom:none !important}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.largeredbtn{font-family:"Raleway",sans-serif;font-weight:900;font-size:16px;line-height:60px;color:#fff !important;text-decoration:none;padding-left:40px;padding-right:80px;padding-top:22px;padding-bottom:22px;background:rgb(234,91,31); background:-moz-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(234,91,31,1)),color-stop(100%,rgba(227,58,12,1))); background:-webkit-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-o-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-ms-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:linear-gradient(to bottom,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5b1f',endColorstr='#e33a0c',GradientType=0 )}.largeredbtn:hover{background:rgb(227,58,12); background:-moz-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(227,58,12,1)),color-stop(100%,rgba(234,91,31,1))); background:-webkit-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-o-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-ms-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:linear-gradient(to bottom,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#e33a0c',endColorstr='#ea5b1f',GradientType=0 )}.fullrounded img{-webkit-border-radius:400px;-moz-border-radius:400px;border-radius:400px}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}.largeredbtn{font-family:"Raleway",sans-serif;font-weight:900;font-size:16px;line-height:60px;color:#fff !important;text-decoration:none;padding-left:40px;padding-right:80px;padding-top:22px;padding-bottom:22px;background:rgb(234,91,31); background:-moz-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(234,91,31,1)),color-stop(100%,rgba(227,58,12,1))); background:-webkit-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-o-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:-ms-linear-gradient(top,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); background:linear-gradient(to bottom,rgba(234,91,31,1) 0%,rgba(227,58,12,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#ea5b1f',endColorstr='#e33a0c',GradientType=0 )}.largeredbtn:hover{background:rgb(227,58,12); background:-moz-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-webkit-gradient(linear,left top,left bottom,color-stop(0%,rgba(227,58,12,1)),color-stop(100%,rgba(234,91,31,1))); background:-webkit-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-o-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:-ms-linear-gradient(top,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); background:linear-gradient(to bottom,rgba(227,58,12,1) 0%,rgba(234,91,31,1) 100%); filter:progid:DXImageTransform.Microsoft.gradient( startColorstr='#e33a0c',endColorstr='#ea5b1f',GradientType=0 )}.fullrounded img{-webkit-border-radius:400px;-moz-border-radius:400px;border-radius:400px}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out;line-height:140%}.tp-caption a:hover{color:#ffa902}@import url(http://fonts.googleapis.com/css?family=Open+Sans:400,800,300,700);.tp-caption a{color:#296169;text-shadow:none;text-decoration:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#296169}.tp-caption a{color:#296169;text-shadow:none;text-decoration:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#296169}.feature-round{color:#000;background:#fff;background:rgba(255,255,255,0.7);font-size:12px;width:100px;height:100px;line-height:14px;text-align:center;text-decoration:none;box-sizing:border-box;padding:35px 35px 35px 35px;background-color:transparent;border-radius:50px 50px 50px 50px;border-width:0px;border-color:#000000;border-style:none}.tp-caption a{color:#ff7302;text-shadow:none;-webkit-transition:all 0.2s ease-out;-moz-transition:all 0.2s ease-out;-o-transition:all 0.2s ease-out;-ms-transition:all 0.2s ease-out}.tp-caption a:hover{color:#ffa902}</style>

@endsection

@section('contenido_body')

    <div id="rev_slider_12_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" data-alias="femip" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
        <!-- START REVOLUTION SLIDER 5.1.6 fullwidth mode -->
        <div id="rev_slider_12_1" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.1.6">
            <ul>	<!-- SLIDE  -->
                <li data-index="rs-52" data-transition="zoomout" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"  data-thumb="assets/399fb-okinawa.jpg"  data-rotate="0"  data-saveperformance="off"  data-title="Intro" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                    <!-- MAIN IMAGE -->
                    <img src="assets/dummy.png"  alt=""  data-lazyload="assets/399fb-okinawa.jpg" data-bgposition="center center" data-kenburns="on" data-duration="10000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="100" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                    <!-- LAYERS -->

                    <!-- LAYER NR. 1 -->
                    <div class="tp-caption tp-shape tp-shapewrapper  "
                         id="slide-52-layer-10"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                         data-width="full"
                         data-height="full"
                         data-whitespace="nowrap"
                         data-transform_idle="o:1;"

                         data-transform_in="opacity:0;s:1500;e:Power3.easeInOut;"
                         data-transform_out="s:300;s:300;"
                         data-start="750"
                         data-basealign="slide"
                         data-responsive_offset="on"
                         data-responsive="off"

                         style="z-index: 5;background-color:rgba(0, 0, 0, 0.40);border-color:rgba(0, 0, 0, 0.50);">
                    </div>

                    <!-- LAYER NR. 2 -->
                    <div class="tp-caption NotGeneric-Title   tp-resizeme"
                         id="slide-52-layer-1"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['0','0','-22','-29']"
                         data-fontsize="['60','70','70','50']"
                         data-lineheight="['70','70','70','50']"
                         data-width="['1044','none','none','none']"
                         data-height="['91','none','none','none']"
                         data-whitespace="['normal','nowrap','nowrap','nowrap']"
                         data-transform_idle="o:1;"

                         data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1000"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"


                         style="z-index: 6; min-width: 1044px; max-width: 1044px; max-width: 91px; max-width: 91px; white-space: normal; font-size: 60px;">VII Convención Mundial de la FEMIP
                    </div>

                    <!-- LAYER NR. 3 -->
                    <div class="tp-caption NotGeneric-SubTitle   tp-resizeme"
                         id="slide-52-layer-4"
                         data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                         data-y="['middle','middle','middle','middle']" data-voffset="['81','52','28','13']"
                         data-fontsize="['35','13','13','13']"
                         data-lineheight="['36','20','20','20']"
                         data-width="['344','none','none','none']"
                         data-height="['37','none','none','none']"
                         data-whitespace="['normal','nowrap','nowrap','nowrap']"
                         data-transform_idle="o:1;"

                         data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:1500;e:Power4.easeInOut;"
                         data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                         data-mask_in="x:0px;y:[100%];s:inherit;e:inherit;"
                         data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                         data-start="1000"
                         data-splitin="none"
                         data-splitout="none"
                         data-responsive_offset="on"


                         style="z-index: 7; min-width: 344px; max-width: 344px; max-width: 37px; max-width: 37px; white-space: normal; font-size: 35px; line-height: 36px;text-align:center;">Okinawa - Japón
                    </div>
                </li>
            </ul>
            <div class="tp-static-layers"></div>
            <div class="tp-bannertimer tp-bottom" style="visibility: hidden !important;"></div>
        </div>
    </div><!-- END REVOLUTION SLIDER -->

    <section class="section section-no-background m-none">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <img class="img-responsive mb-lg" src="/imagenes/oficina.jpg" alt="Office">
                </div>
                <div class="col-md-9">
                    <h2 class="mb-lg"><strong>Federación Mundial de Instituciones Peruanas</strong></h2>
                    <p class="lead">El objetivo más importante de las convenciones de la FEMIP, son las conferencias, donde se tratan temas de vital importancia para nuestra comunidad peruana residente en el extranjero y por ende afecta a sus familiares que viven en el Perú.</p>
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

@endsection


@section('contenido_footer')

    <script type="text/javascript" src="js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="js/jquery.themepunch.revolution.min.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="js/extensions/revolution.extension.actions.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.carousel.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.kenburn.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.layeranimation.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.migration.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.navigation.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.parallax.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.slideanims.min.js"></script>
    <script type="text/javascript" src="js/extensions/revolution.extension.video.min.js"></script>
    <script type="text/javascript">
        var tpj=jQuery;

        var revapi12;
        tpj(document).ready(function() {
            if(tpj("#rev_slider_12_1").revolution == undefined){
                revslider_showDoubleJqueryError("#rev_slider_12_1");
            }else{
                revapi12 = tpj("#rev_slider_12_1").show().revolution({
                    sliderType:"hero",
                    jsFileLocation:"//localhost/slider/revslider-standalone/revslider/public/assets/js/",
                    sliderLayout:"fullwidth",
                    dottedOverlay:"none",
                    delay:9000,
                    navigation: {
                    },
                    responsiveLevels:[1240,1024,778,480],
                    visibilityLevels:[1240,1024,778,480],
                    gridwidth:[1250,1024,778,480],
                    gridheight:[650,500,400,300],
                    lazyType:"single",
                    parallax: {
                        type:"mouse",
                        origo:"slidercenter",
                        speed:2000,
                        levels:[2,3,4,5,6,7,12,16,10,50,47,48,49,50,51,55],
                        type:"mouse",
                    },
                    shadow:0,
                    spinner:"off",
                    autoHeight:"off",
                    disableProgressBar:"on",
                    hideThumbsOnMobile:"off",
                    hideSliderAtLimit:0,
                    hideCaptionAtLimit:0,
                    hideAllCaptionAtLilmit:0,
                    debugMode:false,
                    fallbacks: {
                        simplifyAll:"off",
                        disableFocusListener:false,
                    }
                });
            }
        });	/*ready*/
    </script>

@stop
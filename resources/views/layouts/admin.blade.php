<!DOCTYPE html>
<!--[if IE 8]> <html lang="es" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="es" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="es" class="no-js">
<!--<![endif]-->

<head>
<meta charset="utf-8"/>
<title>Administrador</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>

{{-- ENLACE EXTERNO --}}
{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
{!! HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css') !!}
{!! HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css') !!}
{!! HTML::style('https://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css') !!}

{{-- GLOBAL MANDATORY STYLES --}}
{!! HTML::style('https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.2.3/css/simple-line-icons.css') !!}
{!! HTML::style('assets/global/plugins/uniform/css/uniform.default.css') !!}

{{-- THEME STYLES --}}
{!! HTML::style('assets/global/css/components.css') !!}
{!! HTML::style('assets/global/css/plugins.css') !!}
{!! HTML::style('assets/admin/layout/css/layout.css') !!}
{!! HTML::style('assets/admin/layout/css/themes/darkblue.css') !!}

@yield('contenido_header')

</head>

<body class="page-header-fixed page-quick-sidebar-over-content">

<!-- BEGIN HEADER -->
<div class="page-header navbar">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="admin">
				CMS
			</a>
			<div class="menu-toggler sidebar-toggler hide"></div>
		</div>
		<!-- END LOGO -->

		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
		<!-- END RESPONSIVE MENU TOGGLER -->

		<!-- BEGIN TOP NAVIGATION MENU -->
		<div class="top-menu">
			<ul class="nav navbar-nav pull-right">

                <!-- BEGIN USER LOGIN DROPDOWN -->
				<li class="dropdown dropdown-user">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
					<span class="username">
					{{ Auth::user()->profile->nombres." ".Auth::user()->profile->apellidos }} </span>
					<i class="fa fa-angle-down"></i>
					</a>
					<ul class="dropdown-menu">
						{{--<li><a href="#"><i class="icon-user"></i> Mi Perfil </a></li>--}}
						{{--<li class="divider"></li>--}}
						<li><a href="{{ route('auth.logout') }}"><i class="icon-key"></i> Cerrar sesión </a></li>
					</ul>
				</li>
				<!-- END USER LOGIN DROPDOWN -->
				<!-- BEGIN QUICK SIDEBAR TOGGLER -->
				<li class="dropdown dropdown-quick-sidebar-toggler">
					<a href="{{ route('auth.logout') }}" class="dropdown-toggle">
						<i class="icon-logout"></i>
					</a>
				</li>
				<!-- END QUICK SIDEBAR TOGGLER -->
			</ul>
		</div>
		<!-- END TOP NAVIGATION MENU -->

	</div>
	<!-- END HEADER INNER -->
</div>
<!-- END HEADER -->

<div class="clearfix"></div>

<!-- BEGIN CONTAINER -->
<div class="page-container">

	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
				
				<li class="sidebar-toggler-wrapper"><div class="sidebar-toggler"></div></li>
				
				<li class="sidebar-search-wrapper"><div class="sidebar-search"></div></li>

				<li {!! (Request::is('admin') ? 'class="active open"' : '') !!}>
					<a href="{{ route('admin.home') }}">
						<i class="icon-home"></i>
						<span class="title">Dashboard</span>
					</a>
				</li>

				<li {!! (Request::is('admin/company*') ? 'class="active open"' : '') !!}>
					<a href="javascript:;">
						<i class="icon-globe"></i>
						<span class="title">Empresa</span>
						{!! (Request::is('admin/company*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
					</a>
					<ul class="sub-menu">
						<li {!! (Request::is('admin/company/social*') ? 'class="active"' : '') !!}>
							<a href="{{ route('admin.company.social.edit') }}">
							<i class="icon-share"></i>
							Redes sociales</a>
						</li>
					</ul>
				</li>

				<li {!! (Request::is('admin/slider*') ? 'class="active open"' : '') !!}>
					<a href="{{ route('admin.slider.edit', 1) }}">
						<i class="icon-screen-desktop"></i>
						<span class="title">Slider</span>
					</a>
				</li>

                <li {!! (Request::is('admin/evento*') ? 'class="active open"' : '') !!}>
                    <a href="javascript:;">
                        <i class="icon-grid"></i>
                        <span class="title">Eventos</span>
                        {!! (Request::is('admin/evento*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
                    </a>
                    <ul class="sub-menu">
                        <li {!! (Request::is('admin/eventos') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.eventos.index') }}">
                                <i class="icon-list"></i>
                                Todos los eventos</a>
                        </li>
                        <li {!! (Request::is('admin/eventos/create') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.eventos.create') }}">
                                <i class="icon-note"></i>
                                Nuevo evento</a>
                        </li>
                    </ul>
                </li>

                <li {!! (Request::is('admin/nota-p*') ? 'class="active open"' : '') !!}>
                    <a href="javascript:;">
                        <i class="icon-grid"></i>
                        <span class="title">Notas de Prensa</span>
                        {!! (Request::is('admin/nota-p*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
                    </a>
                    <ul class="sub-menu">
                        <li {!! (Request::is('admin/nota-prensa') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.nota-prensa.index') }}">
                                <i class="icon-list"></i>
                                Todos las notas</a>
                        </li>
                        <li {!! (Request::is('admin/nota-prensa/create') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.nota-prensa.create') }}">
                                <i class="icon-note"></i>
                                Nueva nota de prensa</a>
                        </li>
                    </ul>
                </li>

                <li {!! (Request::is('admin/noti*') ? 'class="active open"' : '') !!}>
                    <a href="javascript:;">
                        <i class="icon-grid"></i>
                        <span class="title">Noticias</span>
                        {!! (Request::is('admin/noti*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
                    </a>
                    <ul class="sub-menu">
                        <li {!! (Request::is('admin/noticias') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.noticias.index') }}">
                                <i class="icon-list"></i>
                                Todos las noticias</a>
                        </li>
                        <li {!! (Request::is('admin/noticias/create') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.noticias.create') }}">
                                <i class="icon-note"></i>
                                Nueva noticia</a>
                        </li>
                    </ul>
                </li>

                <li {!! (Request::is('admin/galeria*') ? 'class="active open"' : '') !!}>
                    <a href="javascript:;">
                        <i class="icon-grid"></i>
                        <span class="title">Galería de Fotos</span>
                        {!! (Request::is('admin/galeria*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
                    </a>
                    <ul class="sub-menu">
                        <li {!! (Request::is('admin/galerias') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.galerias.index') }}">
                                <i class="icon-list"></i>
                                Todos las galerías</a>
                        </li>
                        <li {!! (Request::is('admin/galerias/create') ? 'class="active"' : '') !!}>
                            <a href="{{ route('admin.galerias.create') }}">
                                <i class="icon-note"></i>
                                Nuevo galería de fotos</a>
                        </li>
                    </ul>
                </li>

				<li {!! (Request::is('admin/contacto*') ? 'class="active open"' : '') !!}>
					<a href="javascript:;">
						<i class="icon-envelope"></i>
						<span class="title">Contacto</span>
						{!! (Request::is('admin/contacto*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
					</a>
					<ul class="sub-menu">
						<li {!! (Request::is('admin/contacto/mensajes*') ? 'class="active"' : '') !!}>
							<a href="{{ route('admin.contacto.mensajes.index') }}">
							<i class="icon-speech"></i>
							Mensajes</a>
						</li>
					</ul>
				</li>

				<li {!! (Request::is('admin/user*') ? 'class="active open"' : '') !!}>
					<a href="javascript:;">
						<i class="icon-people"></i>
						<span class="title">Usuarios</span>
						{!! (Request::is('admin/user*') ? '<span class="arrow open"></span>' : '<span class="arrow"></span>') !!}
					</a>
					<ul class="sub-menu">
						<li {!! (Request::is('admin/user') ? 'class="active"' : '') !!}>
							<a href="{{ route('admin.user.index') }}">
							<i class="icon-list"></i>
							Todas los usuarios</a>
						</li>
					</ul>
				</li>

				<li {!! (Request::is('admin/config') ? 'class="active open"' : '') !!}>
					<a href="{{ route('admin.config') }}">
						<i class="icon-settings"></i>
						<span class="title">Configuración</span>
					</a>
				</li>

			</ul>
			<!-- END SIDEBAR MENU -->
		</div>
	</div>
	<!-- END SIDEBAR -->

	<!-- BEGIN CONTENT -->
	<div class="page-content-wrapper">

		<div class="page-content">

			<!-- BEGIN PAGE HEADER-->
			<div class="row">
				<div class="col-md-12">
					<!-- BEGIN PAGE TITLE & BREADCRUMB-->
					<h3 class="page-title">
						@yield('contenido_admin_title')
					</h3>
				</div>
			</div>
			<!-- END PAGE HEADER-->

			@yield('contenido_admin')

		</div>
	</div>
	<!-- END CONTENT -->

</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-tools">
		<span class="go-top"><i class="fa fa-angle-up"></i></span>
	</div>
</div>
<!-- END FOOTER -->

<!--[if lt IE 9]>
{!! HTML::script('assets/global/plugins/respond.min.js') !!}
{!! HTML::script('assets/global/plugins/excanvas.min.js') !!} 
<![endif]-->

{{-- ENLACES EXTERNOS --}}
{!! HTML::script('https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js') !!}
{!! HTML::script('https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js') !!}
{!! HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js') !!}

{!! HTML::script('assets/global/plugins/jquery-migrate-1.2.1.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery.blockui.min.js') !!}
{!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') !!}

{{-- BEGIN PAGE LEVEL SCRIPTS --}}
{!! HTML::script('assets/global/scripts/metronic.js') !!}
{!! HTML::script('assets/admin/layout/scripts/layout.js') !!}

<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
});
</script>

@yield('contenido_footer')

</body>

</html>
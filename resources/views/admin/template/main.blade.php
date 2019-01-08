<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Default') | Panel de Administración</title>
	{{-- BootsTrap.css v3.3.7 --}}
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	{{-- Plugins Chosen V1.8.2 CSS --}}
	<link rel="stylesheet" href="{{ asset('plugins/chosen_v1.8.2/chosen.css') }}">
	{{-- Estilos CSS Personalizados --}}
	<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
	{{-- Plugins Trumbowyg v2.13.0 CSS --}}
	<link rel="stylesheet" href="{{ asset('plugins/trumbowyg/ui/trumbowyg.css') }}">
</head>
<body>
	@include('admin.template.partials.nav')

	<section> {{-- Seccion de mensajes --}}
		@include('flash::message')
		@yield('message')
	</section>
	<section> {{-- Seccion de Contenido --}}		
		@yield('content')
	</section>

	{{-- JQuery v2.2.3 --}}
	<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	{{-- BootTrap.js v3.3.7 --}}
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
	{{-- Plugins Chosen V1.8.2 JS --}}
	<script src="{{ asset('plugins/chosen_v1.8.2/chosen.jquery.js') }}"></script>
	{{-- Plugins Trumbowyg v2.13.0 JS --}}
	<script src="{{ asset('plugins/trumbowyg/trumbowyg.js') }}"></script>
	@yield('js') {{-- yiel creado para poder activar los js en las vistas --}}
	{{-- FIN Plugins Chosen V1.8.2 JS FIN --}}
	{{-- Mensajes con Ventana Modal Personalizado. --}}
	<script>$('#flash-overlay-modal').modal();</script>

	<script>
		{{-- Oculta los mensajes o Alert "No Importantes" Mostrados al Usuario. --}}  
		$('div.alert').not('.alert-important').delay(8000).fadeOut(350);
	</script>
</body>

<footer class="footer">
	<div class="container">	  
	  	<div class="row justify-content-center">
	  		<div class="panel-footer">
		  		<div class="col-sm-6">
		    		<h6>Todos los Derechos Reservados.</h6>	  			
		  		</div>
		  		<div class="col-sm-5">
		  			<h6>Laravel v5.1</h6>
		  		</div>
		  		<div class="text-right">
		  			<h6>© 2018 Copyright</h6>
		  		</div>	  			
	  		</div>
	  	</div>	  
	</div>
</footer>

</html>
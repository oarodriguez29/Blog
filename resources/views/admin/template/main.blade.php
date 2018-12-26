<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Default') | Panel de Administración</title>
	{{-- BootsTrap.css v3.3.7 --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	{{-- Estilos CSS Personalizados --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('css/estilos.css') }}">
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
	<script>
		{{-- Oculta los mensajes o Alert "No Importantes" Mostrados al Usuario. --}}  
		$('div.alert').not('.alert-important').delay(3000).fadeOut(350);
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
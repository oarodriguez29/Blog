<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title','Home') | Blog</title>
	{{-- BootsTrap.css v3.3.7 --}}
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">
	{{-- Estilos CSS Personalizados --}}
{{-- 	<link rel="stylesheet" href="{{ asset('css/estilos.css') }}"> --}}
</head>
<body>
	<header>
		@include('front.template.partials.header')	
	</header>

	<div class="container">
		@yield('content')
		<footer>
			<hr>
			Todos lo Derechos Reservados &copy {{ date('Y') }}
			<div class="pull-right">Oarodriguez</div>
		</footer>
		<br>
	</div>

	{{-- JQuery v2.2.3 --}}
	<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
</body>
</html>
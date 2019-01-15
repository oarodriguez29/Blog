<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Acceso Restringido</title>
	{{-- BootsTrap.css v3.3.7 --}}
	<link rel="stylesheet" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">	

<style type="text/css">
	.error {
		margin-top: 100px;
	}
</style>
</head>
<body>

	<div class="container error">		
		<div class="col-md-4 col-md-offset-4">
			<div class="panel panel-warning">
				<div class="panel-heading">
					<div class="panel-title">
						Acceso Restringido!
					</div>
				</div>
				<div class="panel-body">
					<div class="col-md-2"></div>					
						<img class="img-responsive" src="{{ asset('img/lock.png') }}">					
					<hr>
					<strong class="text-center">
						<p class="text-center">Usted no tiene acceso a esta zona</p>
						<p>
							<a href="{{ route('front.index') }}">¿Deseas volver al inicio?</a>
						</p>
					</strong>
				</div>
			</div>
		</div>
		
	</div>

</body>
</html>
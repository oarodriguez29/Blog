<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>@yield('title', 'Default') | Panel de Administración</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('plugins/bootstrap/css/bootstrap.css') }}">

<style type="text/css">
	/* Sticky footer styles
	-------------------------------------------------- */
	html {
	  position: relative;
	  min-height: 100%;
	}
	body {
	  /* Margin bottom by footer height */
	  margin-bottom: 60px;
	  background-image: url('img/fondohbm.jpg');
	  opacity: 0.9;
	}
	.jumbotron {
		margin-top: 60px;		
	}
	.footer {
	  position: absolute;
	  bottom: 0;
	  width: 100%;
	  /* Set the fixed height of the footer here */
	  height: 60px;
	  background-color: #f5f5f5;
	}


	/* Custom page CSS
	-------------------------------------------------- */
	/* Not required for template or sticky footer method. */

	body > .container {
	  padding: 60px 15px 0;
	}
	.container .text-muted {
	  margin: 20px 0;
	}

	.footer > .container {
	  padding-right: 15px;
	  padding-left: 15px;
	}

	code {
	  font-size: 80%;
	}	
</style>

</head>
<body>
	@include('admin.template.partials.nav')

	<section>
		@yield('content')
	</section>

	<script src="{{ asset('plugins/jQuery/jquery-2.2.3.min.js') }}"></script>
	<script src="{{ asset('plugins/bootstrap/js/bootstrap.min.js') }}"></script>
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
		  			<h6>Copyright © 2018</h6>
		  		</div>	  			
	  		</div>
	  	</div>	  
	</div>
</footer>

</html>
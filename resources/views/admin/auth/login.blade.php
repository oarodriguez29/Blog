@extends('admin.template.main')

@section('title', 'Login')

@section('content')
	<div class="container">
		<div class="col-sm-4"></div>
		<div class="jumbotron col-sm-4">
			<h4 class="text-center clearfix">Login</h4>
			<hr>
			{!! Form::open(['route'=>'admin.auth.login','method'=>'POST']) !!}
				<div class="form-group">
					{!! Form::label('email', 'Correo Electronico') !!}
					{!! Form::email('email', null, ['class'=>'form-control','placeholder'=>'example@mail.com']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('password', 'Contraseña') !!}
					{!! Form::password('password', ['class'=>'form-control','placeholder'=>'**********']) !!}
				</div>

				<div class="form-group text-center">
					<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-log-in"></span> Iniciar</button>
				</div>
			{!! Form::close() !!}
		</div>
		<div class="col-sm-4"></div>
	</div>
@endsection
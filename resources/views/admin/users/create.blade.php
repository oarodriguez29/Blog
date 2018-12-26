@extends('admin.template.main')

@section('title', 'Crear Usuario')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Creación de usuario</legend>			
				{!! Form::open(['route'=>'admin.users.store','method'=>'POST']) !!}

					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', null, ['class'=>'form-control','required','placeholder'=>'Nombre Completo']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email', 'Mail') !!}
						{!! Form::email('email', null, ['class'=>'form-control','required','placeholder'=>'example@mail.com']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('password', 'Contraseña') !!}
						{!! Form::password('password', ['class'=>'form-control','required','placeholder'=>'**********']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('type', 'Tipo') !!}
						{!! Form::select('type', [''=>'>--Seleccione--<', 'member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control','required']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}
					</div>

				{!! Form::close() !!}
			</div>
		
	</div>

@endsection
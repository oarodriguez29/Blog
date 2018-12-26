@extends('admin.template.main')

@section('title', 'Editar Usuario')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Editar Usuario <b>{{ $user->name }}</b></legend>			
				{!! Form::open(['route'=>['admin.users.update', $user],'method'=>'PUT']) !!}

					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', $user->name, ['class'=>'form-control','required','placeholder'=>'Nombre Completo']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('email', 'Mail') !!}
						{!! Form::email('email', $user->email, ['class'=>'form-control','required','placeholder'=>'example@mail.com']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('type', 'Tipo') !!}
						{!! Form::select('type', ['member'=>'Miembro', 'admin'=>'Administrador'], null, ['class'=>'form-control','required']) !!}
					</div>

					<div class="form-group text-right">
						{!! Form::submit('Actualizar', ['class'=>'btn btn-info']) !!}
					</div>

				{!! Form::close() !!}
			</div>
		
	</div>

@endsection
@extends('admin.template.main')

@section('title', 'Agregar Tags')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Agregar Tags</legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>'admin.tags.store','method'=>'POST']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', null, ['class'=>'form-control','required','placeholder'=>'Nombre del Tag']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Agregar', ['class'=>'btn btn-success']) !!}
					</div>

				{!! Form::close() !!}
			</div>		
    </div>
@endsection
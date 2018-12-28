@extends('admin.template.main')

@section('title', 'Registrar Categorias')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Creación de Categoria</legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>'admin.categories.store','method'=>'POST']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', null, ['class'=>'form-control','required','placeholder'=>'Nombre de la Categoria']) !!}
					</div>

					<div class="form-group">
						{!! Form::submit('Registrar', ['class'=>'btn btn-success']) !!}
					</div>

				{!! Form::close() !!}
			</div>		
    </div>
@endsection
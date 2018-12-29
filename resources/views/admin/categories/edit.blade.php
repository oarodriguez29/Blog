@extends('admin.template.main')

@section('title', 'Actualizar Categorias')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Actualizar Categoria <b class="label label-warning">{{ $category->name }}</b></legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>['admin.categories.update', $category],'method'=>'PUT']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', $category->name, ['class'=>'form-control','required','placeholder'=>'Nombre de la Categoria']) !!}
					</div>

					<div class="form-group text-right">
						{!! Form::submit('Actualizar', ['class'=>'btn btn-info']) !!}
					</div>

				{!! Form::close() !!}
			</div>		
    </div>
@endsection
@extends('admin.template.main')

@section('title', 'Agregar Articulo')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Agregar Articulos</legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>'admin.articles.store','method'=>'POST', 'files' => true]) !!}
					<div class="form-group">
						{!! Form::label('title', 'Titulo') !!}
						{!! Form::text('title', null, ['class'=>'form-control','required','placeholder'=>'Titulo del Articulo']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('category_id', 'Categoria') !!}
						{!! Form::select('category_id', $categories, null, ['class'=>'form-control', 'placeholder'=>'Seleccione...', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('content', 'Contenido') !!}
						{!! Form::textarea('content', null, ['class'=>'form-control', 'required', 'rows'=>'4']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('tags', 'Tags') !!}
						{!! Form::select('tags', $tags, null, ['class'=>'form-control', 'multiple', 'required']) !!}
					</div>

					<div class="from-group">
						{!! Form::label('image', 'Imagen') !!}
						{!! Form::file('image') !!}
					</div>
					<br>

					<div class="form-group">
						{!! Form::submit('Agregar Articulo', ['class'=>'btn btn-success']) !!}
					</div>

				{!! Form::close() !!}
			</div>		
    </div>
@endsection
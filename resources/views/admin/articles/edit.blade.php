@extends('admin.template.main')

@section('title', 'Actualizar Articulo')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Actualizar Articulos</legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>['admin.articles.update', $article],'method'=>'PUT']) !!}
					<div class="form-group">
						{!! Form::label('title', 'Titulo') !!}
						{!! Form::text('title', $article->title, ['class'=>'form-control','required','placeholder'=>'Titulo del Articulo']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('category_id', 'Categoria') !!}
						{!! Form::select('category_id', $categories, $article->category->id, ['class'=>'form-control select-cat', 'placeholder'=>'Seleccione...', 'required']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('content', 'Contenido') !!}
						{!! Form::textarea('content', $article->content, ['class'=>'form-control cont', 'required', 'rows'=>'4']) !!}
					</div>

					<div class="form-group">
						{!! Form::label('tags', 'Tags') !!}
						{!! Form::select('tags[]', $tags, $array_tags, ['class'=>'form-control select-tag', 'multiple', 'required']) !!}
					</div>


					<div class="form-group">
						<button type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-save"></span>
						Actualizar Articulo
						</button>
					</div>
					
				{!! Form::close() !!}
			</div>		
    </div>
@endsection

@section('js')
	<script>
		$('.select-tag').chosen({
			placeholder_text_multiple: 'Seleccione un maximo de 3 tags',
			max_selected_options: 3,
			search_contains: true,
			no_results_text: 'No Hay Resultados...'
		});

		$('.select-cat').chosen({
			no_results_text: 'No Hay Resultados...'
		});

		$('.cont').trumbowyg({

		});
	</script>
@endsection
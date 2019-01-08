@extends('admin.template.main')

@section('title', 'Lista de Articulos')

@section('content')
<div class="container">
	<div class="col-sm-2"></div>
	<div class="jumbotron col-sm-8">	
		<div class="container">
		    <div class="table-responsive">
			@section('message')
			    <a href="{{ route('admin.articles.create') }}" class="btn btn-primary" title="Agregar Articulos">Agregar +</a>
				{{-- Buscador --}}
			{{-- 	{!! Form::open(['route'=>'admin.tags.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
					<div class="input-group">
				   		{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Buscar Tags...', 'aria-descripbedby'=>'search']) !!}
						<span class="input-group-addon" id="search">
							<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
						</span>
					</div>
				{!! Form::close() !!} --}}
				{{-- Fin del Buscador --}}
		        <table class="table table-hover text-center">
		          <thead>
		            <tr>
		              <th class="text-center">Nº</th>
		              <th class="text-center">Nombre</th>
		              <th class="text-center">Acción</th>
		            </tr>
		          </thead>
		          <tbody>
		          {{--   @foreach ($tags as $tag)	            	
			            <tr>
			            	<td>{{ $tag->id }}</td>
			            	<td>{{ $tag->name }}</td>
			            	<td>
			            		<a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning" title="Editar">
			            			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			            		</a>
			            		<a href="{{ route('admin.tags.destroy', $tag->id) }}" onclick="return confirm('¿Desea Eliminarlo?')" class="btn btn-danger" title="Eliminar">
			            			<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
			            		</a>
			            	</td>
			            </tr>
		            @endforeach --}}
		          </tbody>
		        </table>
		        <div class="container text-center">
		        	{{-- {!! $tags->render() !!} --}}
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
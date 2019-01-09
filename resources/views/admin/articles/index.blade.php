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
				{!! Form::open(['route'=>'admin.articles.index', 'method'=>'GET', 'class'=>'navbar-form pull-right']) !!}
					<div class="input-group">
				   		{!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Buscar Articulo...', 'aria-descripbedby'=>'search']) !!}
						<span class="input-group-addon" id="search">
							<button type="submit" class="glyphicon glyphicon-search"></button>
						</span>
					</div>
				{!! Form::close() !!}
				{{-- Fin del Buscador --}}
		        <table class="table table-hover text-center">
		          <thead>
		            <tr>
		              <th class="text-center">Nº Reg</th>
		              <th class="text-center">Titulo</th>
		              <th class="text-center">Categoria</th>
		              <th class="text-center">Usuario</th>
		              <th class="text-center">Acción</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach ($articles as $artic)	            	
			            <tr>
			            	<td>{{ $artic->id }}</td>
			            	<td>{{ $artic->title }}</td>
			            	<td>{{ $artic->category->name }}</td>
			            	<td>{{ $artic->user->name }}</td>
			            	<td>
			            		<a href="{{ route('admin.articles.edit', $artic->id) }}" class="btn btn-warning" title="Editar">
			            			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			            		</a>
			            		<a href="{{ route('admin.articles.destroy', $artic->id) }}" onclick="return confirm('¿Desea Eliminarlo?')" class="btn btn-danger" title="Eliminar">
			            			<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
			            		</a>
			            	</td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		        <div class="container text-center">
		        	{!! $articles->render() !!}
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
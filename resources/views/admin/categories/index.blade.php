@extends('admin.template.main')

@section('title', 'Lista de Categorias')

@section('content')
<div class="container">
	<div class="col-sm-2"></div>
	<div class="jumbotron col-sm-8">	
		<div class="container">
		    <div class="table-responsive">
			@section('message')
		    	<p>
		    		<a href="{{ route('admin.categories.create') }}" class="btn btn-primary" title="Agregar Usurios">Agregar +</a>
		    	</p>
		        <table class="table table-hover text-center">
		          <thead>
		            <tr>
		              <th class="text-center">Nº</th>
		              <th class="text-center">Nombre</th>
		              <th class="text-center">Acción</th>
		            </tr>
		          </thead>
		          <tbody>
		            @foreach ($categories as $cat)	            	
			            <tr>
			            	<td>{{ $cat->id }}</td>
			            	<td>{{ $cat->name }}</td>
			            	<td>
			            		<a href="{{ route('admin.categories.edit', $cat->id) }}" class="btn btn-warning" title="Editar">
			            			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			            		</a>
			            		<a href="{{ route('admin.categories.destroy', $cat->id) }}" onclick="return confirm('¿Desea Eliminarlo?')" class="btn btn-danger" title="Eliminar">
			            			<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
			            		</a>
			            	</td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		        <div class="container text-center">
		        	{!! $categories->render() !!}
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection

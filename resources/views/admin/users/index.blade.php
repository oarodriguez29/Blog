@extends('admin.template.main')

@section('title', 'Lista de Usuarios')

@section('content')
<div class="container">
	<div class="jumbotron">	
		<div class="container">
		    <div class="table-responsive">
			@section('message')
		    	<p>
		    		<a href="{{ route('admin.users.create') }}" class="btn btn-primary" title="Agregar Usurios">Agregar +</a>
		    	</p>
		        <table class="table table-hover">
		          <thead>
		            <tr>
		              <th scope="col">nº</th>
		              <th scope="col">Nombre</th>
		              <th scope="col">Correo</th>
		              <th scope="col">Tipo</th>
		              <th>Acción</th>
		            </tr>
		          </thead>
		          <tbody>
		            <tr>
		              <th scope="row">N/A</th>
		              <td>Mark</td>
		              <td>@mdo</td>
		              <td>N/A</td>
		              <td>N/A</td>
		            </tr>
		            @foreach ($users as $user)	            	
			            <tr>
			            	<td>{{ $user->id }}</td>
			            	<td>{{ $user->name }}</td>
			            	<td>{{ $user->email }}</td>
			            	<td>
			            		@if ($user->type == 'admin')
			            			<span class="label label-primary">{{ $user->type }}</span>
			            		@else
			            			<span class="label label-default">{{ $user->type }}</span>
			            		@endif
			            	</td>
			            	<td>
			            		<a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning" title="Editar">
			            			<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
			            		</a>
			            		<a href="{{ route('admin.users.destroy', $user->id) }}" onclick="return confirm('¿Desea Eliminarlo?')" class="btn btn-danger" title="Eliminar">
			            			<span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
			            		</a>
			            	</td>
			            </tr>
		            @endforeach
		          </tbody>
		        </table>
		        <div class="container text-center">
		        	{!! $users->render() !!}
		        </div>
		    </div>
		</div>
	</div>
</div>
@endsection
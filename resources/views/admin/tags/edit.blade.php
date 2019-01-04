@extends('admin.template.main')

@section('title', 'Actualizar Tag')

@section('content')

	<div class="container">
		<div class="col-sm-3"></div>
					
			<div class="jumbotron col-sm-6">
				<legend class="text-center">Actualizar Tag <b class="label label-warning">{{ $tag->name }}</b></legend>

				@include('admin.template.partials.errors')

				{!! Form::open(['route'=>['admin.tags.update', $tag],'method'=>'PUT']) !!}
					<div class="form-group">
						{!! Form::label('name', 'Nombre') !!}
						{!! Form::text('name', $tag->name, ['class'=>'form-control','required','placeholder'=>'Nombre de la Tags']) !!}
					</div>

					<div class="form-group text-right">
						{!! Form::submit('Actualizar', ['class'=>'btn btn-info']) !!}
					</div>

				{!! Form::close() !!}
			</div>		
    </div>
@endsection
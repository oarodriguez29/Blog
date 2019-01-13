@extends('admin.template.main')

@section('title', 'Listado de Imagenes')

@section('content')
<div class="container">
	<div class="jumbotron">
		<div class="container">
			@foreach ($images as $img)
				<div class="col-md-3">
					<div class="panel panel-default">
						<div class="panel-body">
							<img src="/img/articles/{{ $img->name }}" class="img-responsive">
						</div>
						<div class="panel-footer">{{ $img->article->title }}</div>
					</div>
				</div>				
			@endforeach
		</div>
		<div class="text-center">
			{!! $images->render(); !!}
		</div>
	</div>
</div>
@endsection
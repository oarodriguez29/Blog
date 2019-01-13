@extends('front.template.main')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h3 class="text-center">Ultimos Articulos</h3>
			<div class="row">

				@foreach($articles as $art)
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body" style="height: 350px;">
							<a href="#" class="thumbnail">
								@foreach($art->images as $img)
									<img class="img-responsive" src="{{ asset('img/articles/'.$img->name) }}" alt="...">
								@endforeach
							</a>
							<h3 class="text-center">{{ $art->title }}</h3>
							<hr>
							<i class="glyphicon glyphicon-share-alt">
								<a href="#">{{ $art->category->name }}</a>
							</i>
							<div class="pull-right">
								<i class="glyphicon glyphicon-time"></i> {{ $art->created_at->diffForHumans() }}
							</div>
						</div>
					</div>
				</div>

				@endforeach

{{-- 				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="#" class="thumbnail">
								<img class="img-responsive" src="{{ asset('img/fondohbm.jpg') }}" alt="...">
							</a>
							<h3 class="text-center">Titulo del Articulo...</h3>
							<hr>
							<i class="glyphicon glyphicon-share-alt">
								<a href="#">Categoria</a>
							</i>
							<div class="pull-right">
								<i class="glyphicon glyphicon-time"></i> Hace 3 Minutos
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="#" class="thumbnail">
								<img class="img-responsive" src="{{ asset('img/fondohbm.jpg') }}" alt="...">
							</a>
							<h3 class="text-center">Titulo del Articulo...</h3>
							<hr>
							<i class="glyphicon glyphicon-share-alt">
								<a href="#">Categoria</a>
							</i>
							<div class="pull-right">
								<i class="glyphicon glyphicon-time"></i> Hace 3 Minutos
							</div>
						</div>
					</div>
				</div>


				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body">
							<a href="#" class="thumbnail">
								<img class="img-responsive" src="{{ asset('img/fondohbm.jpg') }}" alt="...">
							</a>
							<h3 class="text-center">Titulo del Articulo...</h3>
							<hr>
							<i class="glyphicon glyphicon-share-alt">
								<a href="#">Categoria</a>
							</i>
							<div class="pull-right">
								<i class="glyphicon glyphicon-time"></i> Hace 3 Minutos
							</div>
						</div>
					</div>
				</div> --}}

			</div>
			<div class="text-center">
				{!! $articles->render() !!}
			</div>
		</div>

		<div class="col-md-3">
			<h3 class="text-center">Otros</h3>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Categorias</h3>
				</div>
				<div class="panel-body">
					<ul class="list-group">
						<li class="list-group-item">
							<span class="badge">1</span>
							noticias
						</li>
						<li class="list-group-item">
							<span class="badge">2</span>
							programacion
						</li>
						<li class="list-group-item">
							<span class="badge">3</span>
							noticias 3 
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div class="col-md-3">
			<div class="panel panel-danger">
				<div class="panel-heading">
					<h3 class="panel-title">Tags</h3>
				</div>
				<div class="panel-body">
					
					<span class="label label-primary">admin</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					<span class="label label-default">member</span>
					
				</div>
			</div>
		</div>
	</div>
	
@endsection
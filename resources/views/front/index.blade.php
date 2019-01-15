@extends('front.template.main')

@section('content')
	
	<div class="row">
		<div class="col-md-8">
			<h3 class="text-center">{{ trans('app.title_last_articles') }}</h3>
			<div class="row">

				@foreach($articles as $art)
				
				<div class="col-md-6">
					<div class="panel panel-default">
						<div class="panel-body" style="height: 350px;">
							<a href="{{ route('front.view.article', $art->slug) }}" class="thumbnail">
								@foreach($art->images as $img)
									<img class="img-responsive" src="{{ asset('img/articles/'.$img->name) }}" alt="...">
								@endforeach
							</a>
							<a href="{{ route('front.view.article', $art->slug) }}">
								<h3 class="text-center">{{ $art->title }}</h3>
							</a>
							<hr>
							<i class="glyphicon glyphicon-share-alt">
								<a href="{{ route('front.search.category', $art->category->name) }}">{{ $art->category->name }}</a>
							</i>
							<div class="pull-right">
								<i class="glyphicon glyphicon-time"></i> {{ $art->created_at->diffForHumans() }}
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
			<div class="text-center">
				{!! $articles->render() !!}
			</div>
		</div>

		@include('front.partials.aside')

	</div>
	
@endsection
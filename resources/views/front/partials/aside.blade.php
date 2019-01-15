<div class="col-md-3">
	<h3 class="text-center">Otros</h3>
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Categorias</h3>
		</div>
		<div class="panel-body">

			<ul class="list-group">
				@foreach($categories as $cat)
				
					<li class="list-group-item">
						<span class="badge">{{ $cat->articles->count() }}</span>
						<a href="{{ route('front.search.category', $cat->name) }}">
							{{ $cat->name }}							
						</a>
					</li>

				@endforeach
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
			
			@foreach($tags as $tag)
				<span class="label ">
					<a href="{{ route('front.search.tag', $tag->name) }}">
						{{ $tag->name }}
					</a>
				</span>
			@endforeach
		</div>
	</div>
</div>
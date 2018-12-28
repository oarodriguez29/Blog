{{-- en caso de haber errores --}}
@if (count($errors) > 0)
	<div class="alert alert-danger" role="alert">
		<ul>
			{{-- se muestran los errores --}}
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif
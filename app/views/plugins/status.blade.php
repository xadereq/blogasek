@if(isset($errors) && count($errors->all() > 0))

<div class="alert">
<button type="button" class="close" data-dismiss="alert">&times;</button>
<h4 class="alert-heading">Ooops! Something went wrong!</h4>
	<ul>
		@foreach ($errors->all('<li>:message</li>') as $message)
		{{ $message }}
		@endforeach
	</ul>
</div>

@endif
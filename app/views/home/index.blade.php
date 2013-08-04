@extends('master.master')

@section('content')

@foreach($posts as $post)

	<div class="span4 well">
			<div class="span8">
			<h4><strong>{{ HTML::link('view/' .$post->id, $post->title) }}</strong></h4>
			</div>

			<div class="span6">
			<p>
			{{ substr($post->body, 0, 120 ).'[...]' }}
			</p>

			<p>
			{{ HTML::link('view/' .$post->id, 'Read Moar', array('class' => 'btn btn-default')) }}
			</p>
			</div>
	</div>
@endforeach
{{ $posts->links() }}

@stop
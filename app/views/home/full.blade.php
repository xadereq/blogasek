@extends('master.master')

@section('content')

<div class="span8">
	<h1>{{ HTML::link('view/' .$post->id, $post->title ) }} </h1>
		<div class="span4 well"><p>{{ wordwrap($post->body, 135, "<br>", true) }}</p></div>
	<div>
		<span class="badge badge-success">Created at: {{ $post->created_at }} by author called {{ DB::table('users')->where('id', $post->author_id)->pluck('username') }}</span>
	</div>
	<br>
	@if(Auth::user()->id == Post::find($post->id)->author_id)
	<div>
		{{ HTML::link('view/'.$post->id.'/edit', 'Edit post', array('class' => 'btn btn-primary btn-small') ) }} / {{ HTML::link('delpost/'.$post->id, 'Delete post', array('class' => 'btn btn-danger btn-small') ) }}
	</div>
	@endif
</div>

@stop
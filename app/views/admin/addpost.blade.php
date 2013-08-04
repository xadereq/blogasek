@extends('master.master')
@section('content')

<div class="row">
<div class="span8 well">
	{{ Form::open(array('url' => 'addpost', 'class' => 'form-horizontal')) }}
	{{ Form::hidden('author_id', Auth::user()->id) }}
		@if($errors->any())
		<div class="alert alert-danger">
			<a href"#" class="close" data-dismiss="alert">&times;</a>
			{{ implode('', $errors->all('<li class="error">:message</li>')) }}
		</div>
		@endif

	<div class="form-group">
	<label for="inputEmail" class="col-lg-2 control-label">Post title</label>
		<div class="col-lg-10">
		{{ Form::text('title', '', array('class' => 'form-control', 'placeholder' => 'Title')) }}
		</div>
	</div>

	<div class="form-group">
	<label for="inputEmail" class="col-lg-2 control-label">Post body</label>
		<div class="col-lg-10">
		{{ Form::textarea('body', '', array('class' => 'form-control', 'rows' => '3')) }}
		{{ Form::submit('Just post it!', array('class' => 'btn btn-default')) }}
		{{ HTML::link('addpost', 'Cancel', array('class' => 'btn btn-danger')) }}
		{{ Form::close() }}
		</div>
	</div>
</div>
</div>


@stop
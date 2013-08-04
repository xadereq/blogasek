@extends('master.master')

@section('content')

<div class="row">
	<div class="span4 offset4">
		<div class="well">
			<legend>Sign In</legend>
			{{ Form::open(array('url' => 'login', 'class' => 'form-horizontal')) }}
			
			@if($errors->any())
			<div class="alert alert-error">
				<a href"#" class="close" data-dismiss="alert">&times;</a>
				{{ implode('', $errors->all('<li class="error">:message</li>')) }}
			</div>
			@endif

			<div class="form-group">
				<label for="inputEmail" class="col-lg-2 control-label">Email</label>
				<div class="col-lg-10">
				{{ Form::text('email', '', array('class' => 'form-control', 'placeholder' => 'Email')) }}
				</div>
			</div>

			<div class="form-group">
				<label for="inputPassword" class="col-lg-2 control-label">Password</label>
				<div class="col-lg-10">
				{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
				{{ Form::submit('Sign In', array('class' => 'btn btn-default')) }}
				{{ HTML::link('register', 'Register', array('class' => 'btn btn-success')) }}
				</div>
			</div>
			{{ Form::close() }}
		</div>
	</div>
</div>

@stop
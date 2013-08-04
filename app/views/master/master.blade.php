<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>There should be some title :></title>
{{ HTML::script('js/jquery.js') }}
{{ HTML::script('js/bootstrap.js') }}
{{ HTML::style('css/bootstrap.css') }}
</head>
<body>
	<div class="navbar">
		<a class="navbar-brand" href="/">Blog System</a>
		<ul class="nav navbar-nav">
			@if(Auth::user())
				<li>{{ HTML::link('addpost', 'Add Post') }}</li>
				<li class="disabled">{{ HTML::link('#', 'Delete Post') }}</li>
				<li class="disabled">{{ HTML::link('#', 'List all users') }}</li>
				<li>{{ HTML::link('admin', 'Admin Base') }}</li>
				<li class="disabled">{{ HTML::link('#', 'About author') }}</li>
				<li>{{ HTML::link('logout', 'Logout') }} </li>
			@else
				<li>{{ HTML::link('login', 'Login') }} </li>
				<li class="disabled">{{ HTML::link('#', 'About author') }}</li>
			@endif
		</ul>
	</div>
	<div class="container">
		{{ Notification::showAll() }}
		@yield('content')
	</div>
</body>
</html>
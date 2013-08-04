@extends('master.master')

@section('content')


<div class="span8 well"> 
<h4>Hello {{ ucwords(Auth::user()->username) }}</h4><br>
</div>
<div class="span8 well">
<span class="span4">Would you like to add some post? You can click UP</span>
</div>

@stop
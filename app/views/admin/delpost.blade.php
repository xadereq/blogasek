@extends('master.master')

@section('content')

@if(Auth::user()->id == Post::find($id)->author_id)

<div class="span4 well">
    <h1><p class="text-center">Are you sure that you want delete this post?</h1></p><br>
    <p class="text-info text-center">Here's title of this post:</p>
      <div class="span4 well">{{ Post::find($id)->title }}</div>
    <p class="text-info text-center">And some post body:</p><br>
    <div class="span4 well">{{ substr(Post::find($id)->body, 0, 120) }}</div>
		  {{ HTML::link('#rusure', 'Delete post', array('data-toggle' => 'modal', 'class' => 'btn btn-primary')) }}
      {{ HTML::link('view/'.$id, 'Back to post view', array('style' => 'float:right', 'class' => 'btn btn-danger')) }}

		  <div class="modal fade" id="rusure">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">R U sure that you want delete this post?</h4>
        </div>
        <div class="modal-footer">
          {{ HTML::link('delpost/'.$id.'/trash', 'Yes, i know what i\'m doing!', array('class' => 'btn btn-success')) }}
          {{ HTML::link('#', 'No, i won\'t do this!', array('class' => 'btn btn-danger', 'data-dismiss' => 'modal')) }}
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="span4 well">
  <h1>It isn't your POST!</h1>
</div>
@endif

@stop
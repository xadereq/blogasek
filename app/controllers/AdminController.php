<?php

class AdminController extends BaseController {

	public function getAdminIndex()
	{
		return View::make('admin.index');
	}

	public function getIndex()
	{
		$per_page = 3;
		$posts = Post::orderby('id', 'desc')->paginate($per_page);
		return View::make('home.index')->with('posts', $posts);
	}

	public function getAddPost()
	{
		return View::make('admin.addpost');
	}

	public function addPost()
	{
		$input = Input::all();

		$rules = array('title' => 'required|min:3|max:120', 'body' => 'required');

		$Valid = Validator::make($input, $rules);

		if($Valid->passes())
		{
			$new_post = new Post();
			$new_post->title = $input['title'];
			$new_post->body = $input['body'];
			$new_post->author_id = $input['author_id'];
			$new_post->save();

			return Redirect::to('/');
		}
		else
		{
			return Redirect::to('addpost')->withInput()->withErrors($Valid);
		}

	}

	public function delPost($id)
	{
		$is_exists = DB::table('posts')->where('id', '=', $id)->first();
		if($is_exists)
		{
			// Post::find($id)->delete();
			return View::make('admin.delpost')->with('id', $id);
		}
		else
		{
			return Redirect::to('/');
		}
	}

	public function editPost($id)
	{
		return View::make('admin.editpost')
		->with('id', $id);
	}

	public function makeeditPost($id)
	{
		$input = Input::all();

		$rules = array('title' => 'required|min:3|max:120', 'body' => 'required');

		$Valid = Validator::make($input, $rules);

		if($Valid->passes())		
		{
			$update_post = Post::find($id);
			$update_post->title = $input['title'];
			$update_post->body = $input['body'];
			$update_post->save();

			Notification::success('You have succesfully edited post!');
			return Redirect::to('view/'.$id);
		}
		else
		{
			return Redirect::to('view/'.$id.'/edit')->withInput()->withErrors($Valid);
		}
	}

}
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'AdminController@getIndex');

Route::get('view/{id}', function($post){
$is_exists = DB::table('posts')->where('id', '=', $post)->first();
if($is_exists)
{
	$post = Post::find($post);
	return View::make('home.full')->with('post', $post);
}
else
{
	return Redirect::to('/');
}
})->where('id', '[0-9]+');

Route::get('login', 'HomeController@getLogin');

Route::get('register', 'HomeController@getRegister');

Route::post('register', 'HomeController@postRegister');

Route::post('login', 'HomeController@postLogin');

Route::group(array('before' => 'auth'), function()
{
	Route::get('admin', 'AdminController@getAdminIndex');
	Route::get('addpost', 'AdminController@getAddPost');
	Route::get('delpost/{id}', 'AdminController@delPost')->where('id', '[0-9]+');
	Route::get('view/{id}/edit', 'AdminController@editPost')->where('id', '[0-9]+');
	Route::post('view/{id}/edit', 'AdminController@makeeditPost')->where('id', '[0-9]+');
	Route::post('addpost', 'AdminController@addPost');
});
Route::get('logout', 'HomeController@logout');
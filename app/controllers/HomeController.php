<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function getLogin()
	{
		return View::make('account.login');
	}

	public function getRegister()
	{
		return View::make('account.register');
	}

	public function postLogin()
	{
		$input = Input::all();

		$rules = array('email' => 'required', 'password' => 'required');

		$Valid = Validator::make($input, $rules);

		if($Valid->fails())
		{
			return Redirect::to('login')->withErrors($Valid);
		} else {
			$autoryzacja = array('email' => $input['email'], 'password' => $input['password']);

			if(Auth::attempt($autoryzacja)){
				return Redirect::to('admin');
			}
			else {
				return Redirect::to('login');
			}

		}
	}

	public function postRegister()
	{
		$input = Input::all();

		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required');

		$Valid = Validator::make($input, $rules);
		if($Valid->passes())
		{
			$password = $input['password'];
			$password = Hash::make($password);

			$user = New User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;
			$user->save();

			return Redirect::to('login');
		}
		else
		{
			return Redirect::to('register')->withInput(Input::except('password'))->withErrors($Valid);
		}
	}

	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}
}
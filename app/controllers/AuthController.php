<?php

class AuthController extends BaseController {

	public function getLogin()
	{
		return View::make('auth.neonlogin')->with(['title'=>'Adminstrator Login']);
	}

	public function postCheck()
	{
		$crendentials = [
			'username'=>Input::get('username'),
			'password'=>Input::get('password'),
			'suspended'=>0
		];
		
		if(Auth::attempt($crendentials)){

			if(Auth::user()->is_admin): 
				return Redirect::to('/');
			else:
				return Redirect::to('manage');
			endif;
			// return Redirect::to('/')->with('suc2', 'You have succesfully Login!');
		}

		return Redirect::back()->with('err','Username and Passwrod Did not match! </b>')->withInput();
	}


	public function getLogout()
	{
		Auth::logout();
			return Redirect::to('/auth/login')->with('suc2', 'You have succesfully Logout!');

	}

}

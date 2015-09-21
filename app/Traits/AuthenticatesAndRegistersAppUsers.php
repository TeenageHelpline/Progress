<?php namespace App\Traits;

use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

trait AuthenticatesAndRegistersAppUsers {
	
	use AuthenticatesAndRegistersUsers;

	public function loginPath()
	{
		return route('userLogin');
	}

	public function getRegister()
	{
		return view('user.register');
	}
	
	public function getLogin()
	{
		return view('user.login');
	}

}

<?php namespace App\Helpers;

abstract class User {
	
	public static function logged($role = 'login')
	{
		if(!\Auth::check()) return false;
		return (bool)\Auth::user()->roles()->where('name','=',$role)->first();
	}
	
}

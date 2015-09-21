<?php namespace App\Helpers;

abstract class Site {
	
	public static function checkMessages($errors = array())
	{
		self::checkErrors($errors);
		self::checkInfo();
		self::checkSuccess();
	}
	
	public static function checkInfo()
	{
		if(\Session::has('info'))
		{
			echo '<div class="alert alert-info">';
			echo \Session::get('info');
			echo '</div>';
		}
	}

	public static function checkSuccess()
	{
		if(\Session::has('success'))
		{
			echo '<div class="alert alert-success">';
			echo \Session::get('success');
			echo '</div>';
		}
	}

	public static function checkErrors($errors = array())
	{
		if(\Session::has('error'))
		{
			echo '<div class="alert alert-danger">';
			echo \Session::get('error');
			echo '</div>';
		}
		if((bool)count($errors))
		{
			echo '<div class="alert alert-danger">';
			echo '<strong>Whoops!</strong> Please check the following errors and submit again:<br><br>';
			echo '<ul>';
			foreach($errors->all() as $error)
			{
				echo '<li>'.$error.'</li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}

}

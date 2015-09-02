<?php namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	
	protected $table = 'roles';
	public $timestamps = false;
	
	public function users()
	{
		return $this->belongsToMany('App\Http\Models\User', 'users_roles');
	}
	
}

<?php namespace App\Http\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['firstname', 'lastname', 'email', 'address1', 'address2', 'zip', 'city', 'country', 'dob', 'password'];

	/**
	 * The attributes excluded from the models JSON form.
	 *  
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function roles()
	{
		return $this->belongsToMany('App\Http\Models\Role', 'users_roles');
	}
	public function position()
	{
		return $this->belongsToMany('App\Http\Models\Positon');
	}

	public function hasRole($role = false)
	{
		if(!$role) return false;
		return (bool)$this->roles()->where('name','=',$role)->first();
	}
	
	public function assignRole($role)
	{
		if(gettype($role) == 'string')
		{
			$role = Role::whereName($role)->first();
		}
		return $this->roles()->attach($role);
	}

}

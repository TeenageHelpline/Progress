<?php namespace App\Models;

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
	protected $fillable = [
		'email',
		'password',
		'first_name',
		'last_name',
		'email',
        'address1',
        'address2',
        'zip',
        'city',
        'country',
        'dob',
        'gender'
    ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *  
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function roles()
	{
		return $this->belongsToMany('App\Http\Models\Role', 'users_roles');
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
			$role = Role::where('name', '=', $role)->first();
		}
		return $this->roles()->attach($role);
	}

    public function jobpositions()
    {
        return $this->belongsToMany('App\Http\Models\Jobposition', 'users_jobpositions');
    }

    public function giveJobposition($position)
    {
        if(gettype($position) == 'string')
        {
            $position = Jobposition::where('name', '=', $position)->first();
        }

        return $this->jobpositions()->attach($position);
    }

}

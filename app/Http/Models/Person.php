<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Person
 *
 * A person stored in the database
 *
 * @package App
 */

class Person extends Model
{
    protected $table ='people';

    protected $fillable = ['first_name', 'last_name', 'email',
        'address1', 'address2', 'zip', 'city', 'country', 'dob','gender'];

    public function jobPositions()
    {
        return $this->belongsToMany('App\Http\Models\JobPosition', 'people_job_positions');
    }
    public function giveJobPosition($position)
    {
        if(gettype($position) == 'string')
        {
            $position = JobPosition::where('name', '=', $position)->first();
        }

        return $this->jobPositions()->attach($position);
    }

}

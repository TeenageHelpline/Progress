<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobPosition
 *
 * A job position within the organisation
 *
 * @package App
 */

class JobPosition extends Model
{
    protected $table ='job_positions';

    protected $fillable = ['name'];
}

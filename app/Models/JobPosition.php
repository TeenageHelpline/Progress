<?php

namespace App\Models;

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
    protected $table ='jobpositions';

    protected $fillable = ['name'];
}

<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Jobposition
 *
 * A job position within the organisation
 *
 * @package App
 */

class Jobposition extends Model
{
    protected $table ='jobpositions';

    protected $fillable = ['name'];
}

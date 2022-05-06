<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Language extends Model
{
    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];
}

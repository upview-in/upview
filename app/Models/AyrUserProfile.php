<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;


class AyrUserProfile extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'title',
        'ref_id',
        'profile_key',
        'authorized_on',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    
    protected $dates = [
        'authorized_on',
    ];

}

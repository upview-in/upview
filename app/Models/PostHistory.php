<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class PostHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'profile_key',
        'caption',
        'mentions',
        'media_url',
        'post_info',
        'type',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'media_url' => 'array',
        'post_info' => 'array',
    ];

    public function profile()
    {
        return $this->hasOne(AyrUserProfile::class, 'profile_key', 'profile_key');
    }
}

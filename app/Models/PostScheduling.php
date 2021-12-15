<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;

class PostScheduling extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'platforms',
        'caption',
        'mentions',
        'tags',
        'image_name'
    ];
}

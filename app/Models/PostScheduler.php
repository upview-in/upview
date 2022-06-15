<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class PostScheduler extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'platforms',
        'caption',
        'mentions',
        'tags',
        'image_name',
        'is_scheduled',
        'ayrId',
        'scheduled_at',
        'posted_by',
    ];
}

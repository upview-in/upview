<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserSupport extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'query_title',
        'query_description',
        'query_ss_name',
        'assigned_to',
        'assigned_on_date',
        'status',
        'resolved_at',
        'closed_by',
        'remark'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'resolved_at' => 'datetime',
<<<<<<< HEAD
=======
        'status' => 'boolean',
>>>>>>> jimmy-24122021-merge-issue
        'assigned_on_date' => 'datetime'
    ];
}

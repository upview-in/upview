<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;

class UserSupportQuery extends Model
{
    use HasFactory, SoftDeletes, Searchable;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'user_id',
        'query_title',
        'query_description',
        'query_ss_name',
        'assigned_to',
        'assigned_on_date',
        'status',
        'resolved_at',
        'closed_by',
        'remark',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
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
        'remark',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'resolved_at' => 'datetime',
        'assigned_on_date' => 'datetime',
    ];
}

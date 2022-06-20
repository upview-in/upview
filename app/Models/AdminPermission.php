<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;

class AdminPermission extends Model
{
    use HasFactory, Searchable, SoftDeletes;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'name',
        'slug',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function scopeEnabled($query, $value = true)
    {
        if ($value) {
            return $query->whereNull('enabled')->orWhere('enabled', true);
        }

        return $query->where('enabled', false);
    }

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}

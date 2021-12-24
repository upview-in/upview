<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    /**
     * Searchable attributes
     *
     * @return string[]
     */
    public $searchable = [
        'group',
        'name',
        'slug'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'group',
        'name',
        'slug',
        'enabled'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean'
    ];

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}

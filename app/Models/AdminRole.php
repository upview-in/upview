<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    /**
     * Searchable attributes
     *
     * @return string[]
     */
    public $searchable = [
        'name',
        'slug'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
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

    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}

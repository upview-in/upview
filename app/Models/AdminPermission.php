<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class AdminPermission extends Model
{
    use HasFactory;

    public function roles()
    {
        return $this->belongsToMany(AdminRole::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}

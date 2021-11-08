<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
// use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;

    public function permissions()
    {
        return $this->belongsToMany(AdminPermission::class);
    }

    public function admins()
    {
        return $this->belongsToMany(Admin::class);
    }
}

<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'name',
        'email',
        'message',
    ];
}

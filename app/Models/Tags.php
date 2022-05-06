<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Tags extends Model
{
    use HasFactory, Searchable;

    public $timestamps = false;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'tag',
    ];

    protected $fillable = [
        'tag',
    ];
}
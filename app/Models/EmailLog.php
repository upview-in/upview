<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'email_data',
        'gateway_response',
        'is_sended',
    ];

    protected $casts = [
        'email_data' => 'array',
        'gateway_response' => 'array',
        'is_sended' => 'boolean',
    ];
}

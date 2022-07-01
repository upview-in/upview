<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class SmsLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'sms_data',
        'gateway_response',
        'is_sended',
    ];

    protected $casts = [
        'sms_data' => 'array',
        'gateway_response' => 'array',
        'is_sended' => 'boolean',
    ];
}

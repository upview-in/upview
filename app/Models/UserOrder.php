<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class UserOrder extends Model
{
    use HasFactory, Searchable;

    public static $payment_gateways = [
        'Stripe',
        'Razorpay',
    ];

    public static $status = [
        'Pending',
        'Active',
        'Cancelled',
        'Failed',
        'Expired',
        'Unverified',
        'Invalid',
    ];

    public static $status_color = [
        'primary',
        'success',
        'dark',
        'danger',
        'warning',
        'warning',
        'danger',
    ];

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'payment_id',
        'user_id',
        'plan_id',
        'payment_status',
        'status',
        'purchased_at',
        'expired_at',
        'payment_gateway_using',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id',
        'user_id',
        'plan_id',
        'payment_details',
        'payment_status',
        'status',
        'response_message',
        'purchased_at',
        'expired_at',
        'payment_gateway_using',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'payment_details' => 'array',
        'purchased_at' => 'datetime',
        'expired_at' => 'datetime',
    ];

    public function plan()
    {
        return $this->hasOne(UserRole::class, '_id', 'plan_id');
    }
}

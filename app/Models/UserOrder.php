<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserOrder extends Model
{
    use HasFactory;

    public static $status = [
        'Pending',
        'Active',
        'Cancelled',
        'Failed',
        'Expired'
    ];

    public static $status_color = [
        'primary',
        'success',
        'dark',
        'danger',
        'warning',
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
        'purchased_at',
        'expired_at',
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

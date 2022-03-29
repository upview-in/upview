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
        'Success',
        'Canceled',
        'Failed',
    ];

    public static $status_color = [
        'primary',
        'success',
        'dark',
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
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'payment_details' => 'array',
    ];

    public function plan()
    {
        return $this->hasOne(UserRole::class, '_id', 'plan_id');
    }
}

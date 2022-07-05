<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use App\Permissions\HasPermissionsTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Jenssegers\Mongodb\Auth\User as Authenticatable;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasPermissionsTrait, HasFactory, Notifiable, InteractsWithMedia, Searchable, SoftDeletes;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'birth_date',
        'local_lang',
        'address',
        'city',
        'state',
        'country',
        'currency',
        'awario_profile_hash',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile_number',
        'birth_date',
        'local_lang',
        'address',
        'city',
        'state',
        'country',
        'currency',
        'awario_profile_hash',
        'verified_at',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'verified_at' => 'datetime',
        'enabled' => 'boolean',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(400);
    }

    public function getUserSupportChatCountAttribute()
    {
        return $this->hasMany(UserSupportChat::class, 'user_id', 'id')->count();
    }

    public function userSupportChat(): HasMany
    {
        return $this->hasMany(UserSupportChat::class, 'user_id', 'id');
    }

    public function userSupportChatUnseen()
    {
        return $this->userSupportChat()->whereNull('seen_by_system')->orderBy('created_at', 'desc');
    }
}

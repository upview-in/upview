<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Blog extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia, Searchable, SoftDeletes;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'title',
        'blog_description',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'blog_description',
        'blog_html_page',
        'created_by',
        'updated_by',
        'enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'enabled' => 'boolean',
    ];

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('posters');
    }

    public function createdBy(): HasOne
    {
        return $this->hasOne(Admin::class, '_id', 'created_by');
    }

    public function updatedBy(): HasOne
    {
        return $this->hasOne(Admin::class, '_id', 'updated_by');
    }
}

<?php

namespace App\Models;

use App\Concerns\Models\Searchable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Jenssegers\Mongodb\Eloquent\Model;
use Jenssegers\Mongodb\Relations\HasOne;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\File;

class UserSupportQuery extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, Searchable, InteractsWithMedia;

    public static $attachmentsAcceptMimes = [
        // For videos
        'video/mp4',
        'video/mpeg',
        'video/webm',
        'application/x-mpegURL',
        'video/MP2T',
        'video/3gpp',
        'video/quicktime',
        'video/x-msvideo',
        'video/x-ms-wmv',

        // For images
        'image/jpeg',
        'image/png',
        'image/svg+xml',
        'image/webp',

        // For documents
        'application/zip',
        'application/pdf',
    ];
    public static $attachmentsMaxFiles = 5;
    public static $attachmentsMaxFileSize = 8;

    /**
     * Searchable attributes.
     *
     * @return string[]
     */
    public $searchable = [
        'user_id',
        'query_title',
        'query_description',
        'assigned_to',
        'assigned_on_date',
        'status',
        'resolved_at',
        'closed_by',
        'remark',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'query_title',
        'query_description',
        'assigned_to',
        'assigned_on_date',
        'status',
        'resolved_at',
        'closed_by',
        'remark',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'resolved_at' => 'datetime',
        'assigned_on_date' => 'datetime',
    ];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('query-attachments')
            ->acceptsFile(function (File $file) {
                return in_array($file->mimeType, self::$attachmentsAcceptMimes);
            });
    }

    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function supportUser(): HasOne
    {
        return $this->hasOne(SupportUser::class, '_id', 'assigned_to');
    }

    public function setAssignee(): bool
    {
        $aggregate_by = [
            [
                '$addFields' => [
                    'id' => [
                        '$toString' => '$_id',
                    ],
                ],
            ],
            [
                '$lookup' => [
                    'from' => self::getTable(),
                    'localField' => 'id',
                    'foreignField' => 'assigned_to',
                    'as' => 'assigned_queries',
                ],
            ],
            [
                '$unwind' => [
                    'path' => '$assigned_queries',
                    'preserveNullAndEmptyArrays' => true,
                ],
            ],
            [
                '$group' => [
                    '_id' => '$_id',
                    'assigned_queries' => ['$sum' => 1],
                ],
            ],
            [
                '$sort' => [
                    'assigned_queries' => 1,
                ],
            ],
            [
                '$limit' => 1,
            ],
        ];

        $assignee = SupportUser::raw(function ($collection) use ($aggregate_by) {
            return $collection->aggregate($aggregate_by);
        })->toArray();

        if (!empty($assignee)) {
            $assignee = array_shift($assignee);
            $this->assigned_to = $assignee['_id'];
            $this->assigned_on_date = Carbon::now();
            $this->status = 1;

            return true;
        }

        return false;
    }
}

<?php

/*      Social Media Restrictions - Platform Wise - Ayrshare API     */
//            Blank Property mean not supported by Platform

return [

    'instagram' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpeg'],
            'max_size' => 8388608,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/quicktime', 'video/avi'],
            'max_size' => 3221225472,
        ],
    ],
    'facebook' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/bmp', 'image/jpeg', 'image/gif', 'image/tiff'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/quicktime', 'video/avi'],
            'max_size' => 3221225472,
        ],
    ],
    'linkedin' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpeg', 'image/gif'],
            'max_size' => 5242880,
        ],
        'video' => [
            'supported_types' => ['video/x-ms-asf', 'video/avi', 'video/x-flv', 'video/quicktime', 'video/mp4', 'video/x-matroska', 'video/webm'],
            'max_size' => 10737418240,
        ],
    ],
    'telegram' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/bmp', 'image/jpeg', 'image/gif', 'image/tiff'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_types' => ['video/x-ms-asf', 'video/avi', 'video/x-flv', 'video/quicktime', 'video/mp4', 'video/x-matroska', 'video/webm'],
            'max_size' => 52428800,
        ],
    ],
    'pinterest' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/bmp', 'image/jpeg', 'image/gif', 'image/tiff'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_types' => [],
            'max_size' => 0,
        ],
    ],
    'tiktok' => [
        'image' => [
            'supported_types' => [],
            'max_size' => 0,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/webm'],
            'max_size' => 52428800,
        ],
    ],
    'twitter' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpeg', 'image/gif', 'image/webp'],
            'max_size' => 5242880,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/webm'],
            'max_size' => 536870912,
        ],
    ],
    'youtube' => [
        'image' => [
            'supported_types' => [],
            'max_size' => 0,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/quicktime'],
            'max_size' => 8589934592,
        ],
    ],

];

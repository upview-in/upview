<?php

/*      Social Media Restrictions - Platform Wise - Ayrshare API     */
//            Blank Property mean not supported by Platform

return [

    'instagram' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/png', 'image/jpg'],
            'max_size' => 8388608,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/quicktime', 'video/avi'],
            'max_size' => 3221225472,
            'max_duration' => 60,
            'min_diration' => 3
        ],
    ],
    'facebook' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpg', 'image/bmp', 'image/png', 'image/gif', 'image/tiff'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/quicktime', 'video/avi'],
            'max_size' => 3221225472,
            'max_duration' => 14400,
            'min_diration' => 1
        ],
    ],
    'linkedin' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'],
            'max_size' => 5242880,
        ],
        'video' => [
            'supported_types' => ['video/x-ms-asf', 'video/avi', 'video/x-flv', 'video/quicktime', 'video/mp4', 'video/x-matroska', 'video/webm'],
            'max_size' => 10737418240,
            'max_duration' => 600,
            'min_diration' => 3
        ],
    ],
    'telegram' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpg', 'image/bmp', 'image/gif', 'image/tiff'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_types' => ['video/x-ms-asf', 'video/avi', 'video/x-flv', 'video/quicktime', 'video/mp4', 'video/x-matroska', 'video/webm'],
            'max_size' => 52428800,
            'max_duration' => 14400,
            'min_diration' => 1
        ],
    ],
    'pinterest' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpg', 'image/bmp', 'image/gif', 'image/tiff'],
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
            'max_duration' => 60,
            'min_diration' => 3
        ],
    ],
    'twitter' => [
        'image' => [
            'supported_types' => ['image/jpeg', 'image/jpg', 'image/gif', 'image/webp'],
            'max_size' => 5242880,
        ],
        'video' => [
            'supported_types' => ['video/mp4', 'video/mov'],
            'max_size' => 536870912,
            'max_duration' => 140,
            'min_diration' => 1
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

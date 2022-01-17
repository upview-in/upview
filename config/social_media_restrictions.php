<?php

return [

    'facebook' =>
    [
        'image' => [
            'max_size' => 10485760, /* Bytes */
            'supported_types' =>
            [
                'image/jpeg',
                'image/x-ms-bmp',
                'image/png',
                'image/gif',
                'image/tiff',
            ],
        ],
        'video' =>
        [
            'max_size' => 10737418240,
            'supported_types' =>
            [
                'video/mp4',
                'video/quicktime',
                'video/x-msvideo',
                'video/msvideo',
                'video/avi',
            ],
        ],
        
    ],

    'instagram' =>
    [
        'image' =>[
            'max_size' => 8388608,
            'supported_types' =>
            [
                'image/jpeg',
                'image/png',
            ],     
        ],
       
        'video' => [
            'max_size' => 104857600,
            'supported_types' =>
            [
              'video/mp4',
              'video/quicktime',
            ],
            'max_duration' => 60, /* Seconds */
            'min_duration' => 3,
        ],
        
    ],

    'linkedin' =>
    [
        'image' =>[
            'max_size' => 5242880,
            'supported_types' =>
            [
                'image/jpeg',
                'image/png',
                'image/gif',
            ],     
        ],
       
        'video' => [
            'max_size' => 10737418240,
            'supported_types' =>
            [
              'video/x-ms-asf',
              'video/x-msvideo',
              'video/msvideo',
              'video/avi',
              'video/x-flv',
              'video/quicktime',
              'video/mpeg',
              'video/mp4',
              'video/x-matroska',
              'video/webm',
            ],
            'max_duration' => 600, /* Seconds */
            'min_duration' => 3,
        ],
        
    ],

    'youtube' =>
    [
        'video' => [
            'max_size' => 137438953472,
            'supported_types' =>
            [
              'video/quicktime',
              'video/mp4',
            ],
        ],
        
    ],

    'twitter' =>
    [
        'image' =>[
            'max_size' => 5242880,
            'supported_types' =>
            [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/webp',
            ],     
        ],
       
        'video' => [
            'max_size' => 536870912,
            'supported_types' =>
            [
              'video/quicktime',
              'video/mp4',
             ],
            'max_duration' => 140, /* Seconds */
            'min_duration' => 1,
        ],
        
    ],
    


];


?>

<?php

return [

    'instagram' => [
        'image' => [
            'supported_media_types' => ['JPEG','PNG'],
            'max_size' => 8388608,
        ],
        'video' => [
            'supported_media_types' => ['MP4','MOV','AVI'],
            'max_size' => 3221225472,
        ]
    ],
    'facebook' => [
        'image' => [
            'supported_media_types' => ['JPEG','BMP','PNG','GIF','TIFF'],
            'max_size' => 10485760,
        ],
        'video' => [
            'supported_media_types' => ['MP4','MOV','AVI'],
            'max_size' => 3221225472,
        ]
    ],

];


?>
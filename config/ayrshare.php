<?php

return [


    'AYR_API_KEY' => env('AYR_API_KEY'),
    'AYR_SHORT_LINK_ANALYTICS_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_SHORT_LINK_ANALYTICS_ENDPOINT'), /* GET */
    'AYR_POST_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_POST_ENDPOINT'),  /* POST */
    'AYR_SOCIAL_ANALYTICS_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_SOCIAL_ANALYTICS_ENDPOINT'), /* POST */
    'AYR_POST_SCHEDULE_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_POST_SCHEDULE_ENDPOINT'),  /* POST */
    'AYR_POST_COMMENTS_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_POST_COMMENTS_ENDPOINT'),
    'AYR_POST_HISTORY_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_POST_HISTORY_ENDPOINT'),
    'AYR_MEDIA_POST_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_MEDIA_POST_ENDPOINT'),
    'AYR_PROFILE_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_PROFILE_ENDPOINT'),
    'AYR_SHORT_URL_ENDPOINT ' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_SHORT_URL_ENDPOINT '),
    'AYR_PROFILE_ENDPOINT' => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_PROFILE_ENDPOINT'),
    'AYR_CREATE_PROFILE_ENDPOINT'  => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_CREATE_PROFILE_ENDPOINT'),
    'AYR_DELETE_PROFILE_ENDPOINT'  => env('AYR_ANALYTICS_API_ENDPOINT').env('AYR_DELETE_PROFILE_ENDPOINT'),

];


?>

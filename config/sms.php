<?php

return [
    'endpoint' => env('SMS_GATEWAY_ENDPOINT'),
    'api_key' => env('SMS_GATEWAY_API_KEY'),
    'sender' => env('SMS_GATEWAY_SENDER_ID'),
    'template_ids' => [
        'registration_otp' => '1507165649511617516',
        'reset_password_otp' => '1507165660046514092',
        'welcome_message' => '1507165660126349311',
        'plan_expired' => '1507165660094680072',
        'plan_expiring_in' => '1507165660086977831',
    ],
];
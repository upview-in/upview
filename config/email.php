<?php

return [
    'endpoint' => env('EMAIL_GATEWAY_ENDPOINT'),
    'api_key' => env('EMAIL_GATEWAY_API_KEY'),
    'display_name' => 'UPVIEW',
    'from_email_address' => 'no-replay@upview.in',
    'templates' => [
        'registration_otp' => [
            'subject' => 'Registration OTP',
            'template' => 'templates.email.registration_otp',
        ],
        'welcome' => [
            'subject' => 'Welcome to UPVIEW',
            'template' => 'templates.email.welcome',
        ],
        'plan_expiring_in' => [
            'subject' => 'Plan is expiring soon!',
            'template' => 'templates.email.plan_expiring_in',
        ],
        'plan_expired' => [
            'subject' => 'Plan is expired!',
            'template' => 'templates.email.plan_expired',
        ],
    ]
];

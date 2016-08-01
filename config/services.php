<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('sk_test_VWddDILmiEATZowwCuJF8sTq'),
        'secret' => env('pk_test_cmJQWMfL3RhED2RC627zsGv5'),
    ],
    'braintree' => [
    'model'  => App\User::class,
    'environment' => env('sandbox'),
    'merchant_id' => env('2w65xqt5cjv8ktz6'),
    'public_key' => env('s7bt4q44r7r8kvzz'),
    'private_key' => env('db8a9ab92338eaf9e73bafcd07eefc51'),
    ],

];

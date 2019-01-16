<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],

    'facebook' => [
        'client_id' => '2232547967071035',
        'client_secret' => '68462ad1433107f3d970660b38bf006e',
        'redirect' => 'http://localhost:8000/login/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => env('81uox25xtxk0fx'),
        'client_secret' => env('lKZNgihLXPkDYKvJ'),
        'redirect' => 'http://localhost:8000/login/linkedin/callback'
    ],

    'google' => [
        'client_id' => '574900832343-honalgfheojevn20hkbkb2f5a52m41fd.apps.googleusercontent.com',
        'client_secret' => 'MRaannEDlf-aGJry4VKuvvKY',
        'redirect' => 'http://localhost:8000/login/google/callback',
    ],

];

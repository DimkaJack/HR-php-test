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
        'model' => App\Entities\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'weather' => [
        'current' => 'yandex',
        'yandex' => [
            'key' => env('YANDEX_WEATHER_KEY'),
            'url' => env('YANDEX_WEATHER_URL', 'https://api.weather.yandex.ru/v1/forecast'),
            'limit' => env('YANDEX_WEATHER_LIMIT', 1),
            'hours' => env('YANDEX_WEATHER_HOURS', 'false'),
            'extra' => env('YANDEX_WEATHER_EXTRA', 'false'),
        ],
    ],

];

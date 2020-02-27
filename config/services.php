<?php

return [
    /*
      |--------------------------------------------------------------------------
      | Third Party Services
      |--------------------------------------------------------------------------
      |
      | This file is for storing the credentials for third party services such
      | as Mailgun, Postmark, AWS and more. This file provides the de facto
      | location for this type of information, allowing packages to have
      | a conventional file to locate the various service credentials.
      |
     */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],
    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],
    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '178658357717-qpt66ui1pgpvief1b9r87fdrglnj602c.apps.googleusercontent.com',
        'client_secret' => 'i6J9khvCXcykLkgGWJCvRb4z',
        'redirect' => 'http://localhost/coins/auth/google/callback',
    ],
    'linkedin' => [
        'client_id' => '81c3jwyzfibtvj',
        'client_secret' => 'Jpoy4aY0SNn1PM5C',
        'redirect' => 'http://localhost/coins/auth/linkedin/callback'
    ],
    'facebook' => [
        'client_id' => '260147151637976',
        'client_secret' => '95c2d336bc35f83be6f1441d0534e963',
        'redirect' => 'https://localhost/coins/auth/facebook/callback',
    ],
    'github' => [
        'client_id' => '258990f1d4bb46e5c6b2',
        'client_secret' => '6735ea406cd3a843dc0a71ec4f39f012ebd4d238',
        'redirect' => 'https://localhost/coins/auth/github/callback',
    ],
];

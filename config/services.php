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
    'facebook' => [
        'client_id' => '281960943509749',  //client face của bạn
        'client_secret' => '1659fa74fb3edb93323deb17445da23b',  //client app service face của bạn
        'redirect' => 'http://localhost/CuaHangThoiTranTNG/admin/callback' //callback trả về
    ],
    'google' => [
        'client_id' => '350457216450-pl2jhhln9ncr97i411qpolufhu9docmf.apps.googleusercontent.com',
        'client_secret' => 'HrQYmpGYp6lVxREuxZkp4ofq',
        'redirect' => 'http://localhost/CuaHangThoiTranTNG/google/callback' 
    ],

];

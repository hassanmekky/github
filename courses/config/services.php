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
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'paypal' => [
    'client_id' => 'Afw_hvBKtT0AZN4S8LqKnaAuzoFUO-d_zoWt376cPkgU0RmoUEX-mo4HhBJ3WGZsD3QIkYAxvKqwr9L1',
    'secret' => 'EDrh9vQLAJpC4c5E7CBrafvkSCSOH50dFgsEGSn0aTFBGjh_0jpcyX8n2aEFoZTDMmUIJwVzw4lTCkjI',
    // 'redirect_success' => env('PAYPAL_REDIRECT_SUCCESS'),
    //     'redirect_fail' => env('PAYPAL_REDIRECT_FAIL'),
    //     'account' => env('PAYPAL_CLIENT_ACCOUNT'),
    //     'endpoint' => env('PAYPAL_CLIENT_ENDPOINT'),
    //     'currency' => 'USD',
    //     'config' => [
    //         'mode' => 'sandbox',
    //         'log.LogEnabled' => true,
    //         'log.FileName' => storage_path('logs/paypal.log'),
    //         'log.LogLevel' => 'DEBUG', // PLEASE USE `FINE` LEVEL FOR LOGGING IN LIVE ENVIRONMENTS
    //         'validation.level' => 'log',
    //         'cache.enabled' => true,
            // 'http.CURLOPT_CONNECTTIMEOUT' => 30
            // 'http.headers.PayPal-Partner-Attribution-Id' => '123123123'
        

    ],

];

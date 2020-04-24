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
    //WEBHOST0000 id:2148951902010722 secret:fa940781c528d12657f6b86dad136493
     //anterior id:2148951902010722 secret:fa940781c528d12657f6b86dad136493
    'facebook'=>[
        'client_id'=>'1208844889294471',
        'client_secret'=>'a058de948273e854704cbfa079ecc3fe',
        'redirect'=>'https://www.laboraplanet.com/auth/facebook/callback'
    ],
    'google'=>[
        'client_id'=>'321767942821-q0sq53ediid47ico2uqrlogiugsr9522.apps.googleusercontent.com',
        'client_secret'=>'7_Qnb_04Z2ypVfQlXoBMRDfS',
        'redirect'=>'https://www.laboraplanet.com/auth/google/callback'
    ],
    
    'linkedin'=>[
        'client_id'=>'86l9r6435zp9s6',
        'client_secret'=>'kflrnKqcjAwZoGyv',
        'redirect'=>'https://www.laboraplanet.com/auth/linkedin/callback'
        
    ],
];

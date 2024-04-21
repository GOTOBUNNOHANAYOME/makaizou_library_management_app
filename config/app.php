<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'name'            => env('APP_NAME', 'Laravel'),
    'env'             => env('APP_ENV', 'production'),
    'debug'           => (bool) env('APP_DEBUG', false),
    'url'             => env('APP_URL', 'http://localhost'),
    'sub_domain'      => env('APP_SUB_DOMAIN'),
    'domain'          => env('APP_DOMAIN'),
    'asset_url'       => env('ASSET_URL'),
    'timezone'        => 'Asia/Tokyo',
    'locale'          => 'ja',
    'fallback_locale' => 'en',
    'faker_locale'    => 'en_US',
    'key'             => env('APP_KEY'),
    'cipher'          => 'AES-256-CBC',
    'mail_mailer'     => env('MAIL_MAILER'),
    'mail_host'       => env('MAIL_HOST'),
    'mail_port'       => env('MAIL_PORT'),
    'mail_username'   => env('MAIL_USERNAME'),
    'mail_password'   => env('MAIL_PASSWORD'),

    'maintenance'     => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],
    'providers' => ServiceProvider::defaultProviders()->merge([
        /*
         * Package Service Providers...
         */

        /*
         * Application Service Providers...
         */
        App\Providers\AppServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
    ])->toArray(),
    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),

];

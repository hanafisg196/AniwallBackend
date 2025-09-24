<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [

    /*
    |--------------------------------------------------------------------------
    | Application Name
    |--------------------------------------------------------------------------
    |
    | This value is the name of your application. This value is used when the
    | framework needs to place the application's name in a notification or
    | any other location as required by the application or its packages.
    |
    */

    'name' => env('APP_NAME', 'Laravel'),

    /*
    |--------------------------------------------------------------------------
    | Application Environment
    |--------------------------------------------------------------------------
    |
    | This value determines the "environment" your application is currently
    | running in. This may determine how you prefer to configure various
    | services the application utilizes. Set this in your ".env" file.
    |
    */

    'env' => env('APP_ENV', 'production'),

    /*
    |--------------------------------------------------------------------------
    | Application Debug Mode
    |--------------------------------------------------------------------------
    |
    | When your application is in debug mode, detailed error messages with
    | stack traces will be shown on every error that occurs within your
    | application. If disabled, a simple generic error page is shown.
    |
    */

    'debug' => (bool) env('APP_DEBUG', false),

    /*
    |--------------------------------------------------------------------------
    | Application URL
    |--------------------------------------------------------------------------
    |
    | This URL is used by the console to properly generate URLs when using
    | the Artisan command line tool. You should set this to the root of
    | your application so that it is used when running Artisan tasks.
    |
    */

    'url' => env('APP_URL', 'http://localhost'),

    'asset_url' => env('ASSET_URL'),

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Faker Locale
    |--------------------------------------------------------------------------
    |
    | This locale will be used by the Faker PHP library when generating fake
    | data for your database seeds. For example, this will be used to get
    | localized telephone numbers, street address information and more.
    |
    */

    'faker_locale' => 'en_US',

    /*
    |--------------------------------------------------------------------------
    | Encryption Key
    |--------------------------------------------------------------------------
    |
    | This key is used by the Illuminate encrypter service and should be set
    | to a random, 32 character string, otherwise these encrypted strings
    | will not be safe. Please do this before deploying an application!
    |
    */

    'key' => env('APP_KEY'),

    'cipher' => 'AES-256-CBC',

    /*
    |--------------------------------------------------------------------------
    | Maintenance Mode Driver
    |--------------------------------------------------------------------------
    |
    | These configuration options determine the driver used to determine and
    | manage Laravel's "maintenance mode" status. The "cache" driver will
    | allow maintenance mode to be controlled across multiple machines.
    |
    | Supported drivers: "file", "cache"
    |
    */

    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

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
        App\Providers\CategoryServiceProvider::class,
        App\Providers\WallpaperServiceProvider::class,
        App\Providers\ReviewServiceProvider::class,
        App\Providers\TagServiceProvider::class,
        App\Providers\SlideServiceProvider::class,
        App\Providers\DasbordServiceProvider::class,
        App\Providers\AppSettingServiceProvider::class,
        App\Providers\AdServiceProvider::class,
        App\Providers\ReportServiceProvider::class,
        App\Providers\UserServiceProvider::class,
        Spatie\Tags\TagsServiceProvider::class,
        ProtoneMedia\LaravelFFMpeg\Support\ServiceProvider::class,
        Intervention\Image\ImageServiceProvider::class,
    ])->toArray(),

    /*
    |--------------------------------------------------------------------------
    | Class Aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
        'FFMpeg' => ProtoneMedia\LaravelFFMpeg\Support\FFMpeg::class,
        'Image' => Intervention\Image\Facades\Image::class
    ])->toArray(),


//     {
//   "type": "service_account",
//   "project_id": "animwall-c2259",
//   "private_key_id": "a45f358d9926e9b2bd056358004a2c7b3bf9d6b0",
//   "private_key": "-----BEGIN PRIVATE KEY-----\nMIIEvQIBADANBgkqhkiG9w0BAQEFAASCBKcwggSjAgEAAoIBAQDCsoFdP5vX5lWG\n4lx7TSl6d+rMCnTd3YqA7uqCkD8xI3T7avnpEzHIRjcs/ISGT+fXxFAo8mGLhrLI\nYZC8JJYnE0VjldLZSe70dxkN8tyc0AKnYR86PEBqjtVL3rd8YYpSkGJPrm2342zX\nHtcWu4YBzwhBghmKIAuY6Yzsmh3d06Mwo4056ic9uRx7BZ0GuAq4klnZXgG5p9uL\nXC4B9f0V6HGwwSPpkFYFKrRzmrZGqArXN8CS0vDyyu5wxwOAyVXX0uu9WiYAFlue\nXQTwl76hR7/G3eyh8SeCgkTqOVePqbWYLpnGA6881ns6kTLOAOMtnhXS1frtsKcN\n61fKOF6hAgMBAAECggEABteK6mjEn+ZVMz3pVM1c4ErS9LY+N0agAQxbL8/W4vHT\nHGAqqkOFfPtTRleC1HHHIXd8/xbOCFFpQ7MCm0sj2kKu5RDwlrhde9zRA8wdk+IG\nBv5+iYLerX/1DV1uWWtFhMWvu1Rlrj24Hhd427CUoH83ZkVdgxzBm5PVh52aBKjp\n0e4dfMF+AvuTCkI1mrbm646kV3imIDPamV0QQR9qCXyaeq4zktkpa8M+jsFfvnp/\nMQIDXkwhkSMrQdEdxehnX1Jr1NFgm7s+UWdZ2Z9+HsDS8zf97aqpWNUaOr/fLRXF\nro5f+C73pnppOeMrfp6gXBHi9BHZaYr98R//eyNqEwKBgQDoaMuw3dUxFpOB8GuQ\nYkA9+uTWfs/obefP8Z2UMd5jRw47qoOnNEcmm1lNe29QIiZ5gF2PlfbJO67LwwRe\nnrp2GbEu8ynh8nZvTlGKLJQk/p4zWfXd/ovMNkwTnq3R7zsPti4131LOmfjOPd73\nC7w9e2gE5QaHOwEducAdy2D1owKBgQDWdcD60qPOjWyxe16WmGw3dowG1q11Mtp/\np6kgbwjKl7glQYOK7jokK9J+eppK/0w1uvsln412wclR9hbZvjDPFXvL4WOUlucg\n+/XfB/zM8DMjD4zGHX+mw+qVcnhXCIkU09rG6Sa8sv4aRI/oRbx7ytg1UETPjneq\nmVqtp2e26wKBgQCPhBc0kugRthVEykhCEsoE/CfP5ONSbnwVxug+GUVxHPHHGpbN\n69R8HLZayHyGiXAk24XrIvoQbhCUt0q9e1s9jsQBcBtO8cD9HunvX3PkHG9o2oaf\nnY6KfoUgIH7KAub/3spObifeeOpRwZcsC00k0k37p8oOO/uGdawTOgIX7QKBgGOv\ngo9UX/3/8Pkirlnz6cFyIi5/lUs34yaZSV0hH4YENf1jUYC/sVjk4cgWtyeLOeJz\n0o+vdXMxKqIlcIOwC0IG629eigokhrTnSWdtcA3WzP5MGRRx28cppB3pgpR6DDYZ\nL8Vr1Ky7yq9tFTNTTwR/yjYl5IZR47/x3pt/iA8XAoGARYNu5oiZa54tU8uk7QVI\nngurU7gMNnL4+QI0+u+kg18i3KPuSWoOw4UBuIaL8AalBd2RbDdSUJJ/d801SUtM\nsdir5YiYn506Q6JeSlDV60T1FYpG+X7C9og+4gjISDhm0m1vq59l95f7wMvG7ywR\nTNauwGZAVFTBQ8vJ9RUlRlw=\n-----END PRIVATE KEY-----\n",
//   "client_email": "firebase-adminsdk-20yoo@animwall-c2259.iam.gserviceaccount.com",
//   "client_id": "110596928764097947423",
//   "auth_uri": "https://accounts.google.com/o/oauth2/auth",
//   "token_uri": "https://oauth2.googleapis.com/token",
//   "auth_provider_x509_cert_url": "https://www.googleapis.com/oauth2/v1/certs",
//   "client_x509_cert_url": "https://www.googleapis.com/robot/v1/metadata/x509/firebase-adminsdk-20yoo%40animwall-c2259.iam.gserviceaccount.com",
//   "universe_domain": "googleapis.com"
// }


];

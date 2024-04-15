<?php

namespace App\Providers;

use App\Services\AppSettingService;
use App\Services\Impl\AppSettingServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AppSettingServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [
            AppSettingService::class => AppSettingServiceImpl::class
    ];

    public function provides()
    {
        return [
            AppSettingService::class
        ];
    }




    
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

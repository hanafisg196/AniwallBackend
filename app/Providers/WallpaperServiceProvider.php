<?php

namespace App\Providers;

use App\Services\Impl\WallpaperServiceImpl;
use App\Services\WallpaperService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class WallpaperServiceProvider extends ServiceProvider implements DeferrableProvider
{

    public array $singletons = [

        WallpaperService::class => WallpaperServiceImpl::class
        
    ];

    public function provides() : array
    {
        return [
            WallpaperService::class,
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

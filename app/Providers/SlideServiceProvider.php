<?php

namespace App\Providers;

use App\Services\Impl\SlideServiceImpl;
use App\Services\SlideService;
use Illuminate\Support\ServiceProvider;

class SlideServiceProvider extends ServiceProvider
{
    public array  $singletons =
    [
       SlideService::class => SlideServiceImpl::class
    ];

    public function provides() : array
    {
        return [SlideService::class];
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

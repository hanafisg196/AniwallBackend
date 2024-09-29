<?php

namespace App\Providers;

use App\Services\AdService;
use App\Services\Impl\AdServiceImpl;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class AdServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register services.
     */
    public array $singletons = [
    AdService::class => AdServiceImpl::class
    ];

    public function provides(): array{
        return [
            AdService::class
        ];
    }


    public function register(): void
    {

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}

<?php

namespace App\Providers;

use App\Services\Impl\ReportServiceImpl;
use App\Services\ReportService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ReportServiceProvider extends ServiceProvider implements DeferrableProvider
{
    public array $singletons = [
        ReportService::class => ReportServiceImpl::class
    ];

    public function provides(): array
    {
        return [ReportService::class];
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

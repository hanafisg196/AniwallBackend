<?php

namespace App\Providers;

use App\Services\Impl\ReviewServiceImpl;
use App\Services\ReviewService;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;

class ReviewServiceProvider extends ServiceProvider implements DeferrableProvider
{


    public array $singletons = [

        ReviewService::class => ReviewServiceImpl::class
        
     ];

     public function provides() : array
     {
         return [
             ReviewService::class,
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

<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\MovieRepository;
use App\Services\MovieService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->singleton(MovieService::class, function ($app) {
            return new MovieService($app->make(MovieRepository::class));
        });

        $this->app->singleton(MovieRepository::class, function ($app) {
            return new MovieRepository();
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

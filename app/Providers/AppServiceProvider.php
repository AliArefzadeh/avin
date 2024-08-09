<?php

namespace App\Providers;

use App\Services\PostService;
use App\Services\VideoService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(PostService::class, function ($app) {
            return new PostService();
        });
        $this->app->singleton(VideoService::class, function ($app) {
            return new  VideoService();
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

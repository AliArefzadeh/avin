<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\Video;
use App\Observers\PostObserver;
use App\Observers\VideoObserver;
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
        Video::observe(VideoObserver::class);
        Post::observe(PostObserver::class);
    }
}

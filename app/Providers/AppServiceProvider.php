<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Product;
use App\Observers\SlugObserver;
use App\Observers\TenantObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Category::observe([TenantObserver::class, SlugObserver::class]);
        Product::observe([TenantObserver::class, SlugObserver::class]);
    }
}

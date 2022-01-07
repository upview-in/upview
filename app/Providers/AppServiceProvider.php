<?php

namespace App\Providers;

use App\Providers\TelescopeServiceProvider as ProvidersTelescopeServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Laravel\Telescope\TelescopeServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local') || config('telescope.telescopeProdEnabled', false)) {
            $this->app->register(TelescopeServiceProvider::class);
            $this->app->register(ProvidersTelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        if (App::environment('production')) {
            URL::forceScheme('https');
        }
    }
}

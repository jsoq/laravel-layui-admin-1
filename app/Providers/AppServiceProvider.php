<?php

namespace App\Providers;

use App\Manager\ConfigManager;
use App\Manager\MenuManager;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('admin.config', function ($app) {
            return new ConfigManager();
        });
        $this->app->singleton('admin.menu', function ($app) {
            return new MenuManager();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

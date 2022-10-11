<?php

namespace Sparkout\AdminDashboard;

use Illuminate\Support\ServiceProvider;
use Sparkout\AdminDashboard\App\Console\Commands\GenerateBladeCommand;

class AdminDashboardServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'admin-dashboard');
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'admin-dashboard');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('admin-dashboard.php'),
            ], 'config');

            // Publishing the views.
            /*$this->publishes([
                __DIR__.'/../resources/views' => resource_path('views/vendor/admin-dashboard'),
            ], 'views');*/

            // Publishing assets.
            /*$this->publishes([
                __DIR__.'/../resources/assets' => public_path('vendor/admin-dashboard'),
            ], 'assets');*/

            // Publishing the translation files.
            /*$this->publishes([
                __DIR__.'/../resources/lang' => resource_path('lang/vendor/admin-dashboard'),
            ], 'lang');*/

            // Registering package commands.
            // $this->commands([]);
            $this->commands([GenerateBladeCommand::class]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'admin-dashboard');

        // Register the main class to use with the facade
        $this->app->singleton('admin-dashboard', function () {
            return new AdminDashboard;
        });
    }
}

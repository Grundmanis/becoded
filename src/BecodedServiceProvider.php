<?php
namespace Grundmanis\Becoded;

use Illuminate\Support\ServiceProvider;

class BecodedServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        $this->loadMigrationsFrom(__DIR__.'/../migrations');
        $this->loadViewsFrom(__DIR__ . '/Views', 'becoded_view');
        $this->publishes([
            __DIR__.'/../public/' => public_path('vendor/becoded'),
        ]);
        $this->publishes([
            __DIR__.'/../becoded_config.php' => config_path('becoded_config.php'),
        ]);

    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('becoded', function ($app) {
            return new Becoded;
        });
    }
}
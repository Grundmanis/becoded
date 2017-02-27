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
        include __DIR__ . '/routes.php';
        $this->loadViewsFrom(__DIR__ . '/Views', 'becoded');
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
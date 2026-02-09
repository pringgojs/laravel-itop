<?php

namespace Pringgojs\LaravelItop;

use Illuminate\Support\ServiceProvider;

class LaravelItopServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/itop.php' => config_path('itop.php'),
        ], 'config');

        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        if ($this->app->runningInConsole()) {
            $this->commands([
                Console\Commands\ForwardTestCommand::class,
            ]);
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/itop.php', 'itop');

        $this->app->singleton('itop.forwarder', function ($app) {
            return new Services\ForwarderService($app);
        });
    }
}

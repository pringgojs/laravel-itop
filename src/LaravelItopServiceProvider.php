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
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/itop.php', 'itop');
    }
}

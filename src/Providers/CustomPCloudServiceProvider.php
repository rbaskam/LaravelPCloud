<?php

namespace Rbaskam\LaravelPCloud\Providers;

use Illuminate\Support\ServiceProvider;

class CustomPCloudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-pcloud.php', 'laravel-pcloud.php');
    }

    public function boot()
    {
        $this->publishes([
            // Config
            __DIR__.'/../config/laravel-pcloud.php' => config_path('laravel-pcloud.php'),            
        ], 'laravel-pcloud');

        $this->commands([
            \Rbaskam\LaravelPCloud\Console\CreateAuthorisationTokenCommand ::class,
        ]);
    }
}
<?php

namespace Rbaskam\LaravelPCloud\Providers;

use Illuminate\Support\ServiceProvider;
use Rbaskam\LaravelPCloud\App;
use Rbaskam\LaravelPCloud\Folder;
use Rbaskam\LaravelPCloud\File;

class CustomPCloudServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/laravel-pcloud.php', 'laravel-pcloud.php');

        $this->app->bind('pcloud', function($app) {
            return new App();
        });
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
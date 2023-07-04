<?php

namespace LucaF87\LaravelPCloud\Providers;

use Illuminate\Support\ServiceProvider;
use pCloud\Sdk\App;
use pCloud\Sdk\Folder;
use pCloud\Sdk\File;

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
            \LucaF87\LaravelPCloud\Console\CreateAuthorisationTokenCommand ::class,
        ]);
    }
}
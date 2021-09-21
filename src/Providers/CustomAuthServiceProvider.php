<?php

namespace Rbaskam\LaravelPCloud\Providers;

use Illuminate\Support\ServiceProvider;

class CustomPCloudServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            // Config
            __DIR__.'/../config/laravel-pcloud.php' => config_path('laravel-pcloud.php'),            
        ], 'laravel-pcloud');
    }
}
<?php

namespace Rbaskam\LaravelPCloud\Facades;

use Illuminate\Support\Facades\Facade;

class PCloudFolder extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pcloudfolder';
    }
}
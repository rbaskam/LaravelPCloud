<?php

namespace Rbaskam\LaravelPCloud\Facades;

use Illuminate\Support\Facades\Facade;

class PCloud extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'pcloud';
    }
}
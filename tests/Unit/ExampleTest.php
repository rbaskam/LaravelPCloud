<?php

namespace Rbaskam\LaravelPCloud\Tests;

use Orchestra\Testbench\TestCase;
use Rbaskam\LaravelPCloud\Providers\CustomPCloudServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [CustomPCloudServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
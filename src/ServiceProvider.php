<?php

namespace Smtm\TestLaravelJsonApi;

use Illuminate\Support\ServiceProvider as IlluminateServiceProvider;

class ServiceProvider extends IlluminateServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(
            dirname(dirname(__DIR__)) . '/routes/api.php'
        );
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/json-api-v2.php', 'json-api-v2'
        );
    }
}

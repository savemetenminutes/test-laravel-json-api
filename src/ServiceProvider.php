<?php

namespace Smtm\TestLaravelJsonApi;

class ServiceProvider
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
            dirname(dirname(__DIR__)) . '/config/json-api-v2.php', 'json-api-v2'
        );
    }
}

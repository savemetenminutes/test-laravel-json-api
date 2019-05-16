<?php

/** @alias \CloudCreativity\LaravelJsonApi\Services\JsonApiService */
\CloudCreativity\LaravelJsonApi\Facades\JsonApi
    ::register('v2')
    //->withNamespace('v2')
    //->middleware('auth.basic')
    ->routes(
        function ($api, $router) {
            $api->resource(
                'users',
                [
                    //'only' => ['read'],
                ]
            );
        }
    );

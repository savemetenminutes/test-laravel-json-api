<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Products;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'products';

    public function getAttributes($resource)
    {
        $attributes = $resource->getAttributes();
        unset($attributes['id']);

        return $attributes;
    }

    public function getId($resource)
    {
        return $resource->getKey();
    }
}

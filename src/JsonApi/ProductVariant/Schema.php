<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ProductVariant;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'product-variants';

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

<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\PaymentDetails;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'contracts';

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

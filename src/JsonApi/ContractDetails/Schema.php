<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ContractDetails;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'contracts';
    
    protected $isShowAttributesInIncluded = true;

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

<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Products;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'products';

    //protected $isShowAttributesInIncluded = true;

    public function getAttributes($resource)
    {
        $attributes = $resource->getAttributes();
        unset($attributes['id']);

        return $attributes;
    }

    /**
     * @inheritDoc
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        return [
            'product-variants' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->productVariants,
            ],
        ];
    }

    public function getId($resource)
    {
        return $resource->getKey();
    }
}

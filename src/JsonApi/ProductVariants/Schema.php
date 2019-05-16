<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ProductVariants;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'product-variants';

    protected $isShowAttributesInIncluded = true;

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
            'product' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->product,
            ],
        ];
    }

    public function getId($resource)
    {
        return $resource->getKey();
    }
}

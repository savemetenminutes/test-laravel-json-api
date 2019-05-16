<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Contracts;

use CloudCreativity\LaravelJsonApi\Schema\CreatesEloquentIdentities;
use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    use CreatesEloquentIdentities;
    
    protected $resourceType = 'contracts';

    public function getAttributes($resource)
    {
        $attributes = $resource->getAttributes();
        unset($attributes['id']);

        return $attributes;
    }

    /**
     * @param object $resource
     * @param bool $isPrimary
     * @param array $includeRelationships
     * @return array
     */
    public function getRelationships($resource, $isPrimary, array $includeRelationships)
    {
        if (!$resource instanceof Contract) {
            throw new \RuntimeException('Expecting a contract model.');
        }

        $includes = [
            'user' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => isset($includeRelationships['user']) ?
                    $resource->user : $this->createBelongsToIdentity($resource, 'user'),
            ],
            'voucher' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->voucher
            ],
            'cancellation' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->cancellation
            ],
            'product-variant' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->productVariant,
            ],
            'affiliate' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->affiliate
            ],
            'payment-details' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->paymentDetails
            ],
            'insured-partner' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->insuredPartner
            ],
            'insured-horse' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->insuredHorse
            ],
            'insured-dog' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->insuredDog
            ],
            'insured-drone' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->insuredDrone
            ],
            'contact-details' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->contactDetails
            ],
            // 'voucher' => [
            //     self::SHOW_SELF => true,
            //     self::SHOW_RELATED => true,
            //     self::DATA => isset($includeRelationships['voucher']) ?
            //         $resource->voucher : $this->createBelongsToIdentity($resource, 'voucher'),
            // ],
        ];
        $includes = [
            'user' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => isset($includeRelationships['user']) ?
                    $resource->user : $this->createBelongsToIdentity($resource, 'user'),
            ],
            'product-variant' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->productVariant,
            ],
            'payment-details' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->paymentDetails
            ],
            'contact-details' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->contactDetails
            ],
        ];

        if (isset($includeRelationships['pricings'])) {
            $includes['pricings'] = [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->pricings,
            ];
        }

        return $includes;
    }

    public function getId($resource)
    {
        return $resource->getKey();
    }
}

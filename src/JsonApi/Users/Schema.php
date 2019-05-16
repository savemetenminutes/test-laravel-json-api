<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Users;

use Neomerx\JsonApi\Schema\SchemaProvider;

class Schema extends SchemaProvider
{
    protected $resourceType = 'users';

    protected $isShowAttributesInIncluded = true;

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
        if (!$resource instanceof User) {
            throw new \RuntimeException('Expecting a user model.');
        }

        $includes = [
            'preset-voucher' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->presetVoucher,
            ],
            'voucher' => [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => $resource->voucher
            ],
        ];
        $includes = [];

        if (isset($includeRelationships['active-contracts'])) {
            $includes['active-contracts'] = [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($resource) {
                    return $resource->activeContracts;
                }
            ];
        }
        if (isset($includeRelationships['contracts'])) {
            $includes['contracts'] = [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($resource) {
                    return $resource->contracts;
                }
            ];
        }
        if (isset($includeRelationships['default-contact-details'])) {
            $includes['default-contact-details'] = [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($resource) {
                    return $resource->defaultContactDetails;
                }
            ];
        }
        if (isset($includeRelationships['friends'])) {
            $includes['friends'] = [
                self::SHOW_SELF => true,
                self::SHOW_RELATED => true,
                self::DATA => function () use ($resource) {
                    return $resource->friends;
                    //return $resource->friends;
                }
            ];
        }

        return $includes;
    }

    public function getId($resource)
    {
        return $resource->getKey();
    }
}

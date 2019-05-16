<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Users;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{
    /**
     * @var array
     */
    protected $allowedIncludePaths = [
        'active-contracts',
        'active-contracts.contact-details',
        'active-contracts.product-variant',
        'active-contracts.product-variant.product',
        'active-contracts.payment-details',
        'active-contracts.payment-details.payment-method',
        'contracts',
        'contracts.contact-details',
        'contracts.product-variant',
        'contracts.product-variant.product',
        'contracts.payment-details',
        'contracts.payment-details.payment-method',
    ];

    public function rules($record = null): array
    {
        return [];
    }

    public function queryRules(): array
    {
        return [];
    }
}

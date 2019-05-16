<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Product;

use CloudCreativity\LaravelJsonApi\Validation\AbstractValidators;

class Validators extends AbstractValidators
{
    public function rules($record = null): array
    {
        return [];
    }

    public function queryRules(): array
    {
        return [];
    }
}

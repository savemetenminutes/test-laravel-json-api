<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Products;

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

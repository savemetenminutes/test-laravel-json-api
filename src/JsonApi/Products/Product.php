<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Products;

use Illuminate\Database\Eloquent\Model;
use Smtm\TestLaravelJsonApi\JsonApi\ProductVariants\ProductVariant;

class Product extends Model
{
    public function productVariants()
    {
        return $this->hasMany(ProductVariant::class);
    }
}

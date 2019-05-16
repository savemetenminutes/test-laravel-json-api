<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ProductVariant;

use Illuminate\Database\Eloquent\Model;
use Smtm\TestLaravelJsonApi\JsonApi\Contracts\Contract;
use Smtm\TestLaravelJsonApi\JsonApi\Products\Product;

class ProductVariant extends Model
{
    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Contracts;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Smtm\TestLaravelJsonApi\JsonApi\ProductVariants\ProductVariant;
use Smtm\TestLaravelJsonApi\JsonApi\Users\User;

class Contract extends EloquentModel
{
    /**
     * @var string
     */
    protected $table = 'contracts';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}

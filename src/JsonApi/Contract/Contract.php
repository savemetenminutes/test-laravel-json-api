<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Contract;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Smtm\TestLaravelJsonApi\JsonApi\ProductVariant\ProductVariant;
use Smtm\TestLaravelJsonApi\JsonApi\User\User;

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

<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ContractDetails;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Smtm\TestLaravelJsonApi\JsonApi\ProductVariant\ProductVariant;
use Smtm\TestLaravelJsonApi\JsonApi\Users\User;

class ContractDetails extends EloquentModel
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

    public function contactDetails()
    {
        return $this->belongsTo('App\Models\ContactDetails');
    }
}

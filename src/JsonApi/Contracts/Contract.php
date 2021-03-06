<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Contracts;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Smtm\TestLaravelJsonApi\JsonApi\ContractDetails\ContractDetails;
use Smtm\TestLaravelJsonApi\JsonApi\PaymentDetails\PaymentDetails;
use Smtm\TestLaravelJsonApi\JsonApi\ProductVariant\ProductVariant;
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

    public function contactDetails()
    {
        return $this->belongsTo(ContractDetails::class);
    }

    public function paymentDetails()
    {
        return $this->belongsTo(PaymentDetails::class);
    }
}

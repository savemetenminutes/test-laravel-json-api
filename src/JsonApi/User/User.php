<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\User;

use Illuminate\Database\Eloquent\Model as EloquentModel;
use Smtm\TestLaravelJsonApi\JsonApi\Contracts\Contract;

class User extends EloquentModel
{
    /**
     * @var string
     */
    protected $table = 'contracts';

    public function activeContracts()
    {
        return $this->hasMany(Contract::class)->whereNull('rejected')->where(function ($query) {
            $query->whereNull('cancelled')->orWhere('cancelled', '>', DB::raw('NOW()'));
        });
    }

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}

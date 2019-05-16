<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Users;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Smtm\TestLaravelJsonApi\JsonApi\Contracts\Contract;

class User extends EloquentModel
{
    use Authenticatable, Authorizable;

    const EMAIL_STATUS_NEW = 0;
    const EMAIL_STATUS_TRIGGERED = 1;
    const EMAIL_STATUS_VERIFIED = 2;

    const NO_REMINDER_SENT = 0;
    const FIRST_REMINDER_SENT = 1;
    const SECOND_REMINDER_SENT = 2;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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

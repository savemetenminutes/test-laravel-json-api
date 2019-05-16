<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\Contracts;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model as EloquentModel;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\Access\Authorizable;

class Contract extends EloquentModel
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

    public function voucher()
    {
        return $this->hasOne('App\Models\Voucher');
    }

    public function defaultContactDetails()
    {
        return $this->hasOne('App\Models\ContactDetails')->orderBy('id', 'desc'); // default = newest
    }

    public function presetVoucher()
    {
        return $this->belongsTo('App\Models\Voucher');
    }

    public function affiliate()
    {
        return $this->belongsTo('App\Models\Affiliate');
    }

    public function getFullName()
    {
        return $this->lastname
            ? $this->firstname.' '.$this->lastname
            : $this->firstname
            ;
    }
}

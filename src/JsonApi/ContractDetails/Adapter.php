<?php

namespace Smtm\TestLaravelJsonApi\JsonApi\ContractDetails;

use CloudCreativity\LaravelJsonApi\Eloquent\AbstractAdapter;
use CloudCreativity\LaravelJsonApi\Pagination\StandardStrategy;
use Illuminate\Support\Collection;

class Adapter extends AbstractAdapter
{
    /**
     * Adapter constructor.
     *
     * @param StandardStrategy $paging
     */
    public function __construct(StandardStrategy $paging)
    {
        parent::__construct(new PaymentDetails(), $paging);
    }

    /**
     * @param $query
     * @param Collection $filters
     * @return mixed
     */
    protected function filter($query, Collection $filters)
    {

    }
}

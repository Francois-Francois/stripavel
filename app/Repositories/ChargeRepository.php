<?php

namespace App\Repositories;

use App\Charge;

/**
 * ChargeRepository.
 */
class ChargeRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Charge $model)
    {
        $this->model = $model;
    }
}

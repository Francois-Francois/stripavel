<?php

namespace App\Repositories;

use App\Refund;

/**
* RefundRepository
*/
class RefundRepository extends AbstractRepository
{
    protected $model;

    function __construct(Refund $model)
    {
        $this->model = $model;
    }
}

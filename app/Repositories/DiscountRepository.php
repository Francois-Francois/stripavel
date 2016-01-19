<?php

namespace App\Repositories;

use App\Discount;

class DisountRepository extends AbstractRepository
{
    private $model;

    public function __construct(Disount $model)
    {
        $this->model = $model;
    }
}

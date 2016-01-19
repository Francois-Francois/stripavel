<?php

namespace App\Repositories;

use App\Coupon;

class CouponRepository extends AbstractRepository
{
    private $model;

    public function __construct(Coupon $model)
    {
        $this->model = $model;
    }
}

<?php

namespace App\Repositories;

use App\Subscription;

/**
* SubscriptionRepository
*/
class SubscriptionRepository extends AbstractRepository
{
    protected $model;

    function __construct(Subscription $model)
    {
        $this->model = $model;
    }
}

<?php

namespace App\Repositories;

use App\Card;

/**
* CardRepository
*/
class CardRepository extends AbstractRepository
{
    protected $model;

    function __construct(Card $model)
    {
        $this->model = $model;
    }
}

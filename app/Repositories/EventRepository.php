<?php

namespace App\Repositories;

use App\Model;

/**
* EventRepository
*/
class EventRepository extends AbstractRepository
{
    protected $model;

    function __construct(Event $model)
    {
        $this->model = $model;
    }
}

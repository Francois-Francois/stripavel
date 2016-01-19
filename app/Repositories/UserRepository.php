<?php

namespace App\Repositories;


use app\User;

class UserRepository extends AbstractRepository{


    /**
     * @var User
     */
    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

}
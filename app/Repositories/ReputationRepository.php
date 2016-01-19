<?php

namespace app\Repositories;

use App\Reputation;

/**
 * ReputationRepo.
 */
class ReputationRepository extends AbstractRepository
{
    private $model;

    public function __construct(Reputation $model)
    {
        $this->model = $model;
    }
}

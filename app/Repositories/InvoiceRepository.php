<?php

namespace app\Repositories;

use App\Invoice;

/**
 * InvoiceRepository.
 */
class InvoiceRepository extends AbstractRepository
{
    protected $model;

    public function __construct(Invoice $model)
    {
        $this->model = $model;
    }
}

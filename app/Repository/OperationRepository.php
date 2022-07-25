<?php

namespace App\Repository;

use App\Models\Operation\Operation;
use App\Models\Operation\OperationProperties;
use App\Models\Operation\OperationRepositoryInterface;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionProperties;

class OperationRepository implements OperationRepositoryInterface
{

    public function find(string $id): Operation
    {
        return Operation::findOrFail($id);
    }

    public function findAll(int $pagination): array
    {
        return Operation::orderBy(OperationProperties::OPERATION, 'desc')->paginate($pagination)->toArray();
    }
}

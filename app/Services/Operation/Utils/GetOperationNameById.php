<?php

namespace App\Services\Operation\Utils;

use App\Models\Operation\OperationProperties;
use App\Services\Operation\Persistence\OperationFinder;

class GetOperationNameById
{

    public function __construct(private readonly OperationFinder $finder)
    {
    }

    public function retrieve(string $id): string
    {
        $operation = $this->finder->find($id);

        $operationName = $operation->operation;

        return match(true){
            $operationName === OperationProperties::OPERATION_SALE => OperationProperties::OPERATION_SALE,
            $operationName === OperationProperties::OPERATION_PURCHASE => OperationProperties::OPERATION_PURCHASE,
            default => throw new \Exception("Operation type $operationName couldn't be found"),
        };
    }
}

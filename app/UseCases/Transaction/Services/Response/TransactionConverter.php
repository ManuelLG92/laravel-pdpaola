<?php

namespace App\UseCases\Transaction\Services\Response;

use App\Models\Operation\OperationProperties;
use App\Models\Transaction\Transaction;
use App\Services\Operation\Persistence\OperationFinder;
use App\Services\Product\Persistence\ProductFinder;

class TransactionConverter
{

    public function __construct(
        private readonly ProductFinder $productFinder,
        private readonly OperationFinder $operationFinder,
    ) {
    }

    public function convert(array $transactions)
    {
        $response = [];

        if (empty($transactions)) {
            return $response;
        }

        $operations = $this->operationFinder->findAll();

        $operationsArray = [];

        foreach ($operations as $operation) {
            $operationsArray[$operation[OperationProperties::ID]] = $operation[OperationProperties::OPERATION];
        }
        /**
 * @var Transaction $transaction 
*/
        foreach ($transactions as $transaction) {
            $transactionDto = new TransactionResponse(
                $transaction->id,
                $this->productFinder->findById($transaction->productId),
                $operationsArray[$transaction->operationId]
            );

            $response[] = $transactionDto->toArray();
        }

        return $response;
    }
}

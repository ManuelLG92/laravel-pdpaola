<?php

namespace App\UseCases\Transaction\Update;

use App\Http\Dto\Transaction\TransactionUpdateDto;
use App\Models\Operation\OperationProperties;
use App\Models\Transaction\Transaction;
use App\Services\Operation\Utils\GetOperationNameById;
use App\Services\Product\Persistence\UpdateProductStock;
use App\Services\Transaction\Persistence\TransactionFinder;
use App\Services\Transaction\Persistence\TransactionSaver;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class TransactionUpdateUseCase
{

    private ?TransactionUpdateDto $transactionUpdateDto = null;
    private ?Transaction $transaction = null;
    public function __construct(
        private readonly TransactionSaver $saver,
        private readonly TransactionFinder $finder,
        private readonly UpdateProductStock $updateProductStock,
        private readonly GetOperationNameById $getOperationNameById,
    ) {
    }

    public function __invoke(TransactionUpdateDto $transactionUpdateDto): void
    {
        $this->transaction = $this->finder->find($transactionUpdateDto->id);

        $this->transactionUpdateDto = $transactionUpdateDto;

        $this->checkIfHasSameCanceledValue();

        $this->transaction->update($transactionUpdateDto->toArray());

        $this->updateStock();

        $this->saver->save($this->transaction);
    }

    private function checkIfHasSameCanceledValue(): void
    {
        if ($this->transaction->isCanceled === $this->transactionUpdateDto->isCancelled) {
            $id = $this->transaction->id;
            $canceled = $this->transaction->isCanceled;
            throw new BadRequestException("Transaction $id has the same value current onCanceled field than from request: Value $canceled");
        }
    }

    private function updateStock(): void
    {
        $operationName = $this->getOperationNameById->retrieve($this->transaction->operationId);

        if ($operationName !== OperationProperties::OPERATION_SALE) {
            return;
        }
        $amount = $this->transaction->isCanceled ? 1 : -1;
        $this->updateProductStock->apply($this->transaction->productId,  $amount);
    }

}

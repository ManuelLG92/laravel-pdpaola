<?php

namespace App\UseCases\Transaction\Create;

use App\Http\Dto\Transaction\TransactionCreateDto;
use App\Models\Transaction\Transaction;
use App\Services\Transaction\Persistence\TransactionSaver;

class TransactionCreateUseCase
{

    public function __construct(private readonly TransactionSaver $saver)
    {
    }

    public function __invoke(TransactionCreateDto $transactionCreateDto): void
    {
        $transaction = Transaction::create($transactionCreateDto->toArray());

        $this->saver->save($transaction);
    }
}

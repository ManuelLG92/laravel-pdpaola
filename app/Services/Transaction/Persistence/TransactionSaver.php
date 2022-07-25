<?php

namespace App\Services\Transaction\Persistence;

use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionRepositoryInterface;

class TransactionSaver
{
    public function __construct(private readonly TransactionRepositoryInterface $repository)
    {
    }

    public function save(Transaction $transaction): void
    {

        $this->repository->save($transaction);
    }
}

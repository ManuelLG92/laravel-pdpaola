<?php

namespace App\Repository;

use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionProperties;
use App\Models\Transaction\TransactionRepositoryInterface;

class TransactionRepository implements TransactionRepositoryInterface
{

    public function find(string $id): Transaction
    {
        return Transaction::findOrFail($id);
    }

    public function save(Transaction $transaction): void
    {
        $isCreated = $transaction->save();

        if (!$isCreated) {
            throw new \Exception('Your transaction could not be saved. Try again later.');
        };
    }


    public function findAll(int $pagination): array
    {
        return Transaction::orderBy(TransactionProperties::ID, 'desc')->paginate($pagination)->toArray();
    }
}

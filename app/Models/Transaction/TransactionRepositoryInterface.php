<?php

namespace App\Models\Transaction;

interface TransactionRepositoryInterface
{
    public function find(string $id): Transaction;
    public function save(Transaction $transaction): void;
    public function findAll(int $pagination): array;
}

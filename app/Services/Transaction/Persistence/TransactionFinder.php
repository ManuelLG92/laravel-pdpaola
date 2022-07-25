<?php

namespace App\Services\Transaction\Persistence;

use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionRepositoryInterface;

class TransactionFinder
{
    public function __construct(private readonly TransactionRepositoryInterface $repository)
    {
    }

    public function find(string $id): Transaction
    {
        return $this->repository->find($id);
    }

    public function findAll(int $pagination = 10): array
    {
        return $this->repository->findAll($pagination = 10);
    }
}

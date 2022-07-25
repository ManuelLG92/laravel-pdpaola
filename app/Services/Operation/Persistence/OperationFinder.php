<?php

namespace App\Services\Operation\Persistence;

use App\Models\Operation\Operation;
use App\Models\Operation\OperationRepositoryInterface;

class OperationFinder
{
    public function __construct(private readonly OperationRepositoryInterface $repository)
    {
    }

    public function find(string $id): Operation
    {
        return $this->repository->find($id);
    }

    public function findAll(int $pagination = 10): array
    {
        return $this->repository->findAll($pagination);
    }
}

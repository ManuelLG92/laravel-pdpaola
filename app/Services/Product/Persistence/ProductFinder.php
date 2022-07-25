<?php

namespace App\Services\Product\Persistence;

use App\Models\Product\Product;
use App\Models\Product\ProductRepositoryInterface;

class ProductFinder
{

    public function __construct(private readonly ProductRepositoryInterface $repository)
    {
    }

    public function findById(string $id): Product
    {
        return $this->repository->find($id);
    }

    public function findAll(int $pagination = 10): array
    {
        return $this->repository->findAll($pagination);
    }
}

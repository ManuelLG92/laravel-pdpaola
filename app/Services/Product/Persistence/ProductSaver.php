<?php

namespace App\Services\Product\Persistence;

use App\Models\Product\Product;
use App\Models\Product\ProductRepositoryInterface;

class ProductSaver
{

    public function __construct(private readonly ProductRepositoryInterface $repository)
    {
    }

    public function save(Product $product): void
    {
        $this->repository->save($product);
    }
}

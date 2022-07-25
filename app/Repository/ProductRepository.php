<?php

namespace App\Repository;

use App\Models\Product\Product;
use App\Models\Product\ProductProperties;
use App\Models\Product\ProductRepositoryInterface;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class ProductRepository implements ProductRepositoryInterface
{
    public function save(Product $product): void
    {
        $isCreated = $product->save();

        if (!$isCreated) {
            throw new \Exception('Your user could not be saved!');
        };
    }

    public function find(string $id): Product
    {
        return Product::findOrFail($id);
    }

    public function findAll(int $pagination): array
    {
        return Product::orderBy(ProductProperties::STOCK, 'desc')->paginate($pagination)->toArray();
    }
}

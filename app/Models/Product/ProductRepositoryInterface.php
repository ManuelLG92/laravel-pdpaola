<?php

namespace App\Models\Product;

interface ProductRepositoryInterface
{

    public function save(Product $product): void;
    public function find(string $id): Product;
    public function findAll(int $pagination): array;

}

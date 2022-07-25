<?php

namespace App\Services\Product\Persistence;

class UpdateProductStock
{
    public function __construct(
        private readonly ProductSaver $saver,
        private readonly ProductFinder $finder,
    ) {
    }

    public function apply(string $id, int $amount): void
    {
        $product = $this->finder->findById($id);

        if ($product->stock === 0 || $amount === 0 ) {
            return;
        }

        $product->updateStock($amount);

        $this->saver->save($product);
    }
}

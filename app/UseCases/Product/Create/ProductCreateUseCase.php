<?php

namespace App\UseCases\Product\Create;

use App\Http\Dto\Product\ProductCreateDto;
use App\Models\Product\Product;
use App\Services\Product\Persistence\ProductSaver;

class ProductCreateUseCase
{

    public function __construct(private readonly ProductSaver $saver)
    {
    }

    public function __invoke(ProductCreateDto $productDto): void
    {
        $product = Product::create($productDto->toArray());

        $this->saver->save($product);
    }
}

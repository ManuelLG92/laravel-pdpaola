<?php

namespace App\UseCases\Product\FindById;

use App\Http\Dto\IdDto;
use App\Services\Product\Persistence\ProductFinder;

class ProductFindByIdUseCase
{
    public function __construct(
        private readonly ProductFinder   $finder,
    ) {
    }

    public function __invoke(IdDto $productDto): array
    {
        $product = $this->finder->findById($productDto->id);

        return $product->toArray();
    }

}

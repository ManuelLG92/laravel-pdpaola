<?php

namespace App\UseCases\Product\FindAll;

use App\Http\Dto\IdDto;
use App\Services\Product\Persistence\ProductFinder;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductFindAllUseCase
{
    public function __construct(
        private readonly ProductFinder   $finder,
    ) {
    }

    public function __invoke(): array
    {
        return $this->finder->findAll();
    }

}

<?php

namespace App\UseCases\Product\FindById;

use App\Http\Dto\IdDto;
use App\Models\Product\ProductValidations;
use App\Services\Validator\AppValidator;

class ProductFindByIdHandler
{
    public function __construct(
        private readonly ProductFindByIdUseCase $useCase,
        private readonly AppValidator       $appValidator,
    ) {
    }

    public function __invoke(array $request): array
    {
        $productDto = IdDto::build($request);
        $this->appValidator->validate($productDto->toArray(), ProductValidations::id());

        return ($this->useCase)($productDto);
    }
}

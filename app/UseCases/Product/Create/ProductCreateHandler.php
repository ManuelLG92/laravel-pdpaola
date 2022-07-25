<?php

namespace App\UseCases\Product\Create;

use App\Http\Dto\Product\ProductCreateDto;
use App\Models\Product\ProductValidations;
use App\Services\Validator\AppValidator;

class ProductCreateHandler
{

    public function __construct(
        private readonly ProductCreateUseCase $useCase,
        private readonly AppValidator         $appValidator,
    ) {
    }

    public function __invoke(array $request): void
    {
        $productDto = ProductCreateDto::build($request);

        $this->appValidator->validate($productDto->toArray(), ProductValidations::create());

        ($this->useCase)($productDto);
    }
}

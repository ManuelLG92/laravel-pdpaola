<?php

namespace App\UseCases\Product\FindAll;


class ProductFindAllHandler
{
    public function __construct(
        private readonly ProductFindAllUseCase $useCase,
    ) {
    }

    public function __invoke(): array
    {
        return ($this->useCase)();
    }
}

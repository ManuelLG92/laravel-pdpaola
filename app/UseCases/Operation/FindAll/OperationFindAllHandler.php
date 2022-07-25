<?php

namespace App\UseCases\Operation\FindAll;

class OperationFindAllHandler
{
    public function __construct(
        private readonly OperationFindAllUseCase $useCase,
    ) {
    }

    public function __invoke(): array
    {
        return ($this->useCase)();
    }
}

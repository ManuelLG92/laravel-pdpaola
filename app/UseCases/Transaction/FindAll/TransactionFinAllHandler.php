<?php

namespace App\UseCases\Transaction\FindAll;

use App\Http\Dto\IdDto;
use App\Models\Transaction\TransactionValidation;
use App\Services\Validator\AppValidator;

class TransactionFinAllHandler
{

    public function __construct(
        private readonly TransactionFindAllUseCase $useCase,
    ) {
    }

    public function __invoke(): array
    {
        return ($this->useCase)();
    }
}

<?php

namespace App\UseCases\Transaction\Update;

use App\Http\Dto\Transaction\TransactionCreateDto;
use App\Http\Dto\Transaction\TransactionUpdateDto;
use App\Models\Transaction\TransactionValidation;
use App\Services\Validator\AppValidator;

class TransactionUpdateHandler
{

    public function __construct(
        private readonly TransactionUpdateUseCase $useCase,
        private readonly AppValidator         $appValidator,
    ) {
    }

    public function __invoke(array $request): void
    {
        $transactionCreateDto = TransactionUpdateDto::build($request);

        $this->appValidator->validate($transactionCreateDto->toArray(), TransactionValidation::update());

        ($this->useCase)($transactionCreateDto);
    }
}

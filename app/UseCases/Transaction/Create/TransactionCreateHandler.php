<?php

namespace App\UseCases\Transaction\Create;

use App\Http\Dto\Transaction\TransactionCreateDto;
use App\Models\Transaction\TransactionValidation;
use App\Services\Validator\AppValidator;

class TransactionCreateHandler
{

    public function __construct(
        private readonly TransactionCreateUseCase $useCase,
        private readonly AppValidator         $appValidator,
    ) {
    }

    public function __invoke(array $request): void
    {
        $transactionCreateDto = TransactionCreateDto::build($request);

        $this->appValidator->validate($transactionCreateDto->toArray(), TransactionValidation::create());

        ($this->useCase)($transactionCreateDto);
    }
}

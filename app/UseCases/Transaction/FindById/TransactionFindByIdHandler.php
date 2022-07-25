<?php

namespace App\UseCases\Transaction\FindById;

use App\Http\Dto\IdDto;
use App\Models\Transaction\TransactionValidation;
use App\Services\Validator\AppValidator;

class TransactionFindByIdHandler
{

    public function __construct(
        private readonly AppValidator               $appValidator,
        private readonly TransactionFindByIdUseCase $useCase,
    ) {
    }

    public function __invoke(array $request): array
    {
        $idDto = IdDto::build($request);

        $this->appValidator->validate($idDto->toArray(), TransactionValidation::id());

        return ($this->useCase)($idDto);
    }
}

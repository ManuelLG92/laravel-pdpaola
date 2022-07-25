<?php

namespace App\UseCases\Transaction\FindById;

use App\Http\Dto\IdDto;
use App\Services\Transaction\Persistence\TransactionFinder;

class TransactionFindByIdUseCase
{
    public function __construct(private readonly TransactionFinder $finder)
    {
    }

    public function __invoke(IdDto $idDto): array
    {
        $transaction = $this->finder->find($idDto->id);

        return $transaction->toArray();
    }

}

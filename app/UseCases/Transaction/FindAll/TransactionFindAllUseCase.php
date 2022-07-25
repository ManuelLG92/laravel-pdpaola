<?php

namespace App\UseCases\Transaction\FindAll;

use App\Http\Dto\IdDto;
use App\Services\Transaction\Persistence\TransactionFinder;

class TransactionFindAllUseCase
{
    public function __construct(private readonly TransactionFinder $finder)
    {
    }

    public function __invoke(): array
    {
        return $this->finder->findAll();
    }

}

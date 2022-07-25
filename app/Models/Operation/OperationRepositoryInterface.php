<?php

namespace App\Models\Operation;

interface OperationRepositoryInterface
{
    public function find(string $id): Operation;
    public function findAll(int $pagination): array;

}

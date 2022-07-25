<?php

namespace App\UseCases\Operation\FindAll;

use App\Services\Operation\Persistence\OperationFinder;

class OperationFindAllUseCase
{
    // inmemory cache
    private array $cache = [];
    public function __construct(private readonly OperationFinder $finder)
    {
    }

    public function __invoke(): array
    {
        if (count($this->cache) > 0){
            return $this->cache;
        }

        $items = $this->finder->findAll();
        $this->cache = $items;
        return $this->cache;
    }
}

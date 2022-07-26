<?php

namespace App\UseCases\Transaction\Services\Response;

use App\Models\Transaction\TransactionProperties;

class TransactionResponse
{
    public function __construct(
        public readonly string $id,
        public readonly string $product,
        public readonly string $operation,
    ) {
    }

    public function toArray(): array
    {
        return [
            TransactionProperties::ID => $this->id,
            'product' => $this->product,
            'operation' => $this->operation,
        ];
    }
}

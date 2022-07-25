<?php

namespace App\Http\Dto;

use App\Models\Transaction\TransactionProperties;

class TransactionDto extends Base
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?int    $isCancelled,
        public readonly ?string $productId,
        public readonly ?string $operationId,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[TransactionProperties::ID] ?? null,
            $data[TransactionProperties::IS_CANCELED] ?? 0,
            $data[TransactionProperties::PRODUCT_ID] ?? null,
            $data[TransactionProperties::OPERATION_ID] ?? null,
        );
    }
}

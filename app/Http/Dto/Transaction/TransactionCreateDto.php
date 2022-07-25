<?php

namespace App\Http\Dto\Transaction;

use App\Http\Dto\Base;
use App\Models\Product\ProductProperties;

class TransactionCreateDto extends Base
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?string $name,
        public readonly ?int $price,
        public readonly ?int $stock,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[ProductProperties::ID] ?? null,
            $data[ProductProperties::NAME] ?? null,
            $data[ProductProperties::PRICE] ?? null,
            $data[ProductProperties::STOCK] ?? null
        );
    }

}

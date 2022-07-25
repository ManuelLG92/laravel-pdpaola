<?php

namespace App\Http\Dto\Product;

use App\Http\Dto\Base;
use App\Models\Product\ProductProperties;
use App\Models\Transaction\TransactionProperties;

class ProductCreateDto extends Base
{
    public function __construct(
        public readonly ?string $name,
        public readonly ?int    $stock,
        public readonly ?int    $price,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[ProductProperties::NAME] ?? null,
            $data[ProductProperties::STOCK] ?? null,
            $data[ProductProperties::PRICE] ?? null,
        );
    }
}

<?php

namespace App\Http\Dto\Product;

use App\Http\Dto\Base;
use App\Models\Product\ProductProperties;

class ProductUpdateStockDto extends Base
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?int $stock,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[ProductProperties::ID] ?? null,
            $data[ProductProperties::PRICE] ?? null,
        );
    }

}

<?php

namespace App\Http\Dto;

use App\Models\Product\ProductProperties;

class IdDto extends Base
{
    public function __construct(
        public readonly ?string $id,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[ProductProperties::ID] ?? null,
        );
    }
}

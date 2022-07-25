<?php

namespace App\Http\Dto;

use App\Models\Operation\OperationProperties;

class OperationDto extends Base
{

    public function __construct(
        public readonly ?string $id,
        public readonly ?string $operation,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[OperationProperties::ID] ?? null,
            $data[OperationProperties::OPERATION] ?? null,
        );
    }
}

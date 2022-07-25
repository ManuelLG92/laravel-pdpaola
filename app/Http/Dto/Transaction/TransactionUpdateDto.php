<?php

namespace App\Http\Dto\Transaction;

use App\Http\Dto\Base;
use App\Models\Transaction\TransactionProperties;

class TransactionUpdateDto extends Base
{
    public function __construct(
        public readonly ?string $id,
        public readonly ?bool   $isCancelled,
    ) {
    }

    public static function build(array $data): self
    {
        return new self(
            $data[TransactionProperties::ID] ?? null,
            $data[TransactionProperties::IS_CANCELED] ?? null,
        );
    }

}

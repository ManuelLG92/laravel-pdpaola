<?php

namespace App\Models\Shared\Services\Validation;

use App\Models\Shared\Services\Constants\SharedConstants;

class BaseValidation
{
    public static function id(): array
    {
        return [
            SharedConstants::ID => 'required|string|uuid',
        ];
    }
}

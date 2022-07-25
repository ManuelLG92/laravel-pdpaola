<?php

namespace App\Models\Transaction;

use App\Models\Shared\Services\Validation\BaseValidation;

class TransactionValidation extends BaseValidation
{
    public static function create(): array
    {
        return [
            ...self::common(),
            ...self::operation(),
        ];
    }

    public static function update(): array
    {
        return [
            ...BaseValidation::id(),
            ...self::common()
        ];
    }

    private static function common(): array
    {
        return [
            TransactionProperties::PRODUCT_ID => 'required|string|uuid|exists:products,id',
            TransactionProperties::IS_CANCELED => 'required|numeric|min:0|max:1',
        ];
    }

    private static function operation(): array
    {
        return [
            TransactionProperties::OPERATION_ID => 'required|string|uuid|exists:operations,id',
        ];
    }

}

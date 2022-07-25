<?php

namespace App\Models\Product;

use App\Models\Shared\Services\Validation\BaseValidation;

class ProductValidations extends BaseValidation
{
    public static function create(): array
    {
        return [
            ProductProperties::NAME => 'required|string|min:2|max:100',
            ProductProperties::STOCK => 'required|numeric|min:0|max:10000',
            ProductProperties::PRICE => 'required|numeric|min:0|max:5000',
        ];
    }

    public static function updateStock(): array
    {
        return [
            ...BaseValidation::id(),
            [ProductProperties::STOCK => 'required|numeric|min:1|max:10000']
        ];
    }

}

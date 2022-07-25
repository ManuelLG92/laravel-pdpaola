<?php

namespace App\Services\Validator;

enum ValidationConstants: string
{
    case REQUIRED = 'required';
    case NUMERIC = 'numeric';

    public static function buildValidationString(array $data): string
    {
        return implode('|', $data);
    }
}

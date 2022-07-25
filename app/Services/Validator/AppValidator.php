<?php

namespace App\Services\Validator;

use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpKernel\Exception\UnprocessableEntityHttpException;

class AppValidator
{

    public function validate(array $data, array $rules): void
    {
        $validation = Validator::make($data, $rules);
        if ($validation->fails()) {
            throw new UnprocessableEntityHttpException($validation->errors()->toJson());
        }

    }
}

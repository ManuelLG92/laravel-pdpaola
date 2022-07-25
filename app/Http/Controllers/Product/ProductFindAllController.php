<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\UseCases\Product\FindAll\ProductFindAllHandler;
use Illuminate\Http\JsonResponse;

class ProductFindAllController extends Controller
{
    public function __construct(private readonly ProductFindAllHandler $handler)
    {
    }

    public function __invoke(): JsonResponse
    {
        $data =  ($this->handler)();

        return $this->response($data);
    }
}

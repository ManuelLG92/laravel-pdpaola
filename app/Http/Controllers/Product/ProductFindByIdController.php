<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product\ProductProperties;
use App\UseCases\Product\FindById\ProductFindByIdHandler;
use Illuminate\Http\JsonResponse;

class ProductFindByIdController extends Controller
{
    public function __construct(private readonly ProductFindByIdHandler $handler)
    {
    }

    public function __invoke(string $id): JsonResponse
    {
        $data = ($this->handler)([ProductProperties::ID => $id]);

        return $this->response($data);

    }
}

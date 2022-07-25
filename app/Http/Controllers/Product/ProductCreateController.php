<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\UseCases\Product\Create\ProductCreateHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductCreateController extends Controller
{
    public function __construct(private readonly ProductCreateHandler $handler)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        ($this->handler)($request->toArray());

        return $this->response([], Response::HTTP_CREATED);
    }
}

<?php

namespace App\Http\Controllers\Operation;

use App\Http\Controllers\Controller;
use App\UseCases\Operation\FindAll\OperationFindAllHandler;
use Illuminate\Http\JsonResponse;

class OperationFindAllController extends Controller
{

    public function __construct(private readonly OperationFindAllHandler $handler)
    {
    }

    public function __invoke(): JsonResponse
    {
        $response = ($this->handler)();

        return $this->response($response);
    }
}

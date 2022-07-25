<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\UseCases\Transaction\Update\TransactionUpdateHandler;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransactionUpdateController extends Controller
{
    public function __construct(private readonly TransactionUpdateHandler $handler)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        ($this->handler)($request->toArray());

        return $this->response([], Response::HTTP_NO_CONTENT);

    }
}

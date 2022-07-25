<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\UseCases\Transaction\FindAll\TransactionFinAllHandler;
use Illuminate\Http\JsonResponse;

class TransactionFindAllController extends Controller
{
    public function __construct(private readonly TransactionFinAllHandler $handler)
    {
    }

    public function __invoke(): JsonResponse
    {
        $data = ($this->handler)();

        return $this->response($data);

    }
}

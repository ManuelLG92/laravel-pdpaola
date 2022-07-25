<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use App\Models\Transaction\TransactionProperties;
use App\UseCases\Transaction\FindById\TransactionFindByIdHandler;
use Illuminate\Http\JsonResponse;

class TransactionFindByIdController extends Controller
{
    public function __construct(private readonly TransactionFindByIdHandler $handler)
    {
    }

    public function __invoke(string $id): JsonResponse
    {
        $data = ($this->handler)([TransactionProperties::ID => $id]);

        return $this->response($data);

    }
}

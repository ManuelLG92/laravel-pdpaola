<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Product\ProductFindByIdController;
use App\Http\Controllers\Product\ProductCreateController;
use App\Http\Controllers\Product\ProductFindAllController;
use App\Http\Controllers\Transaction\TransactionCreateController;
use App\Http\Controllers\Transaction\TransactionUpdateController;
use App\Http\Controllers\Transaction\TransactionFindByIdController;
use App\Http\Controllers\Transaction\TransactionFindAllController;
use App\Http\Controllers\Operation\OperationFindAllController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/product/{id:uuid}', ProductFindByIdController::class);
Route::post('/product', ProductCreateController::class);
Route::get('/product', ProductFindAllController::class);

Route::get('/transaction/{id:uuid}', TransactionFindByIdController::class);
Route::post('/transaction', TransactionCreateController::class);
Route::get('/transaction', TransactionFindAllController::class);
Route::put('/transaction/{id:uuid}', TransactionUpdateController::class);

Route::get('/operation', OperationFindAllController::class);


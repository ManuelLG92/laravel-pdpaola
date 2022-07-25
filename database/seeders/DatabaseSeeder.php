<?php

namespace Database\Seeders;

use App\Models\Operation\Operation;
use App\Models\Operation\OperationProperties;
use App\Models\Product\Product;
use App\Models\Transaction\Transaction;
use App\Models\Transaction\TransactionProperties;
use Database\Factories\Product\ProductFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $sale = new Operation([OperationProperties::OPERATION => 'sale']);
        $sale->save();
        $purchase = Operation::create([OperationProperties::OPERATION => 'purchase']);
        $purchase->save();
        $operationArray = [$sale['id']->serialize(), $purchase['id']->serialize()];

        $ids = ProductFactory::byTimes();

        $transaction = 20;
        for (; $transaction > 0; $transaction--){
            Transaction::create(
                [
                    TransactionProperties::PRODUCT_ID => $ids[array_rand($ids)],
                    TransactionProperties::IS_CANCELED => rand(0, 1),
                    TransactionProperties::OPERATION_ID => $operationArray[array_rand($operationArray)],
                ]
            )->save();
        }
    }
}

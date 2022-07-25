<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Transaction\TransactionProperties;
use App\Models\Product\ProductProperties;
use App\Models\Operation\OperationProperties;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(TransactionProperties::TABLE_NAME, function (Blueprint $table) {
            $table->string(TransactionProperties::ID)->unique();
            $table->boolean(TransactionProperties::IS_CANCELED);
            $table->string(TransactionProperties::OPERATION_ID);
            $table->string(TransactionProperties::PRODUCT_ID);
            $table->timestamps();
            $table->foreign(TransactionProperties::PRODUCT_ID)
                ->references(ProductProperties::ID)
                ->on(ProductProperties::TABLE_NAME);
            $table->foreign(TransactionProperties::OPERATION_ID)
                ->references(OperationProperties::ID)
                ->on(OperationProperties::TABLE_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(TransactionProperties::TABLE_NAME);
    }
};

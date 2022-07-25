<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Product\ProductProperties;
use App\Models\Transaction\TransactionProperties;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(ProductProperties::TABLE_NAME, function (Blueprint $table) {
            $table->string(ProductProperties::ID)->unique();
            $table->string(ProductProperties::NAME);
            $table->integer(ProductProperties::PRICE);
            $table->integer(ProductProperties::STOCK);
            $table->timestamps();

            /*$table->string(ProductProperties::TRANSACTION_ID);
            $table->timestamps();
            $table->foreign(ProductProperties::TRANSACTION_ID)
                ->references(TransactionProperties::ID)
                ->on(TransactionProperties::TABLE_NAME);*/
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(ProductProperties::TABLE_NAME);
    }
};

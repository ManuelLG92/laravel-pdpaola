<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use \App\Models\Operation\OperationProperties;
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(OperationProperties::TABLE_NAME, function (Blueprint $table) {
            $table->string(OperationProperties::ID)->unique();
            $table->string(OperationProperties::OPERATION);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(OperationProperties::TABLE_NAME);
    }
};

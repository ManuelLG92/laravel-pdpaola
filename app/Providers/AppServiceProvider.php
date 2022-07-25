<?php

namespace App\Providers;

use App\Models\Operation\OperationRepositoryInterface;
use App\Models\Product\ProductRepositoryInterface;
use App\Models\Transaction\TransactionRepositoryInterface;
use App\Repository\OperationRepository;
use App\Repository\ProductRepository;
use App\Repository\TransactionRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
        $this->app->bind(OperationRepositoryInterface::class, OperationRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

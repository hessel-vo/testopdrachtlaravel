<?php
//RapideTest

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EloquentProductRepository;
use App\Repositories\PlainSqlProductRepository;
use App\Repositories\Interfaces\ProductRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // Register the repository interface binding
        $this->app->bind(ProductRepositoryInterface::class, PlainSqlProductRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}

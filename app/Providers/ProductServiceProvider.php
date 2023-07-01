<?php

namespace App\Providers;

use App\Notifiers\Interfaces\ProductChangesNotifierInterface;
use App\Notifiers\ProductChangesNullNotifier;
use App\Services\Decorators\ErrorLogDecoratedProductService;
use App\Services\Interfaces\ProductServiceInterface;
use App\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ProductServiceInterface::class, function () {
            return $this->app->make(ErrorLogDecoratedProductService::class,[
                'decorated' => $this->app->make(ProductService::class),
                'logger' => $this->app->make('log'),
            ]);
        });

        $this->app->singleton(
            ProductChangesNotifierInterface::class,
            ProductChangesNullNotifier::class
        );
    }
}

<?php

namespace App\Providers;

use App\Http\Services\Decorators\ErrorLogDecoratedProductService;
use App\Http\Services\Interfaces\ProductServiceInterface;
use App\Http\Services\ProductService;
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
    }
}

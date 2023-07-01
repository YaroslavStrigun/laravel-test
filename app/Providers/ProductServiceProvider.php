<?php

namespace App\Providers;

use App\Http\Services\Interfaces\ProductServiceInterface;
use App\Http\Services\ProductService;
use Illuminate\Support\ServiceProvider;

class ProductServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->app->bind(ProductServiceInterface::class, ProductService::class);
    }
}

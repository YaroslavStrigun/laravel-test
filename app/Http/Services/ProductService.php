<?php

namespace App\Http\Services;

use App\Http\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;

class ProductService implements ProductServiceInterface
{
    public function delete(Product $product): bool
    {
        return $product->delete();
    }

    public function create(array $data): ?Product
    {
        $product = new Product();
        $product->fill($data);
        $product->save();

        return $product;
    }

    public function update(Product $product, array $data): ?Product
    {
        $product->fill($data);
        $product->save();
        $product->fresh();

        return $product;
    }
}


<?php

namespace App\Services;

use App\Models\Product;
use App\Services\Interfaces\ProductServiceInterface;

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


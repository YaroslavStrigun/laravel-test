<?php

namespace App\Services\Interfaces;

use App\Models\Product;

interface ProductServiceInterface
{
    public function delete(Product $product): bool;

    public function create(array $data): ?Product;

    public function update(Product $product, array $data): ?Product;
}

<?php

namespace App\Notifiers\Interfaces;

use App\Models\Product;

interface ProductChangesNotifierInterface
{
    public function notifyCreated(Product $product): void;

    public function notifyUpdated(Product $product): void;

    public function notifyDeleted(Product $product): void;
}

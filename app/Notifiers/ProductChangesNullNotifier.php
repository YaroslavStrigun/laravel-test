<?php

namespace App\Notifiers;

use App\Models\Product;
use App\Notifiers\Interfaces\ProductChangesNotifierInterface;

class ProductChangesNullNotifier implements ProductChangesNotifierInterface
{
    public function notifyCreated(Product $product): void
    {
        // some logic
    }

    public function notifyUpdated(Product $product): void
    {
        // some logic
    }

    public function notifyDeleted(Product $product): void
    {
        // some logic
    }
}

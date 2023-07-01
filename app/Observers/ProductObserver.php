<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifiers\Interfaces\ProductChangesNotifierInterface;

class ProductObserver
{
    public function __construct(
        private readonly ProductChangesNotifierInterface $changesNotifier
    ) {
    }

    /**
     * Handle the Product "created" event.
     *
     * @param Product $product
     * @return void
     */
    public function created(Product $product): void
    {
        $this->changesNotifier->notifyCreated($product);
    }

    /**
     * Handle the Product "updated" event.
     *
     * @param Product $product
     * @return void
     */
    public function updated(Product $product): void
    {
        $this->changesNotifier->notifyUpdated($product);
    }

    /**
     * Handle the Product "deleted" event.
     *
     * @param Product $product
     * @return void
     */
    public function deleted(Product $product): void
    {
        $this->changesNotifier->notifyDeleted($product);
    }
}

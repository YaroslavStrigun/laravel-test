<?php

namespace App\Http\Services\Decorators;

use App\Http\Services\Interfaces\ProductServiceInterface;
use App\Models\Product;
use Psr\Log\LoggerInterface;

class ErrorLogDecoratedProductService implements ProductServiceInterface
{
    public function __construct(
        private readonly ProductServiceInterface $decorated,
        private readonly LoggerInterface $logger,
    ) {
    }

    public function delete(Product $product): bool
    {
        try {
            return $this->decorated->delete($product);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage(), [
                'exception' => $e,
            ]);

            return false;
        }
    }

    public function create(array $data): ?Product
    {
        try {
            return $this->decorated->create($data);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage(), [
                'exception' => $e,
            ]);

            return null;
        }
    }

    public function update(Product $product, array $data): ?Product
    {
        try {
            return $this->decorated->update($product, $data);
        } catch (\Throwable $e) {
            $this->logger->error($e->getMessage(), [
                'exception' => $e,
            ]);

            return null;
        }
    }
}

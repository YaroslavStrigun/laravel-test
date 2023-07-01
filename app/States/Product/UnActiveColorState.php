<?php

namespace App\States\Product;

use App\States\Product\Interfaces\ProductColorStateInterface;

class UnActiveColorState implements ProductColorStateInterface
{
    public function getColor(): string
    {
        return '#ff0c16';
    }
}

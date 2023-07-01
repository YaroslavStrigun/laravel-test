<?php

namespace App\States\Product;

use App\States\Product\Interfaces\ProductColorStateInterface;

class ActiveColorState implements ProductColorStateInterface
{
    public function getColor(): string
    {
        return '#1dff46';
    }
}

<?php

namespace App\Models;

use App\States\Product\ActiveColorState;
use App\States\Product\Interfaces\ProductColorStateInterface;
use App\States\Product\UnActiveColorState;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property bool $is_active
 * @property string $color
 * @property string $name
 * @property string $description
 * @property float $price
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getColorAttribute(): string
    {
        return $this->getColorState()->getColor();
    }

    private function getColorState(): ProductColorStateInterface
    {
        return match ($this->is_active) {
            true => new ActiveColorState(),
            false => new UnActiveColorState(),
        };
    }
}

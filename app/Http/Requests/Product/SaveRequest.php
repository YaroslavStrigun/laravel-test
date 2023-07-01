<?php

namespace App\Http\Requests\Product;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Unique;

class SaveRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
                'max:21',
                $this->getUniqueNameRule(),
            ],
            'description' => [
                'required',
                'string',
            ],
            'price' => [
                'required',
                'numeric',
                'max:99999999,99',
                'regex:/^\d+(\.\d{1,2})?$/',
            ]
        ];
    }

    private function getUniqueNameRule(): Unique
    {
        $rule = Rule::unique('products', 'name');

        /** @var Product $product */
        $product = $this->route('product');
        if (!$product) {
            return $rule;
        }

        return $rule->ignoreModel($product);
    }
}

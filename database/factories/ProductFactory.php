<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->text(21),
            'description' => $this->faker->text(),
            'price' => $this->faker->randomDigitNotNull(),
            'is_active' => $this->faker->boolean(),
        ];
    }
}

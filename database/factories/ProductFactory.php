<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numerify('SKU-####'),
            'name' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 10, 1000),
            'weight' => $this->faker->randomFloat(2, 0.1, 5),
            'descriptions' => $this->faker->sentence(),
            'thumbnail' => $this->faker->imageUrl(),
            'image' => $this->faker->imageUrl(),
            'category' => $this->faker->word(),
            'create_date' => now(),
            'stock' => $this->faker->numberBetween(1, 100),
        ];
    }
}

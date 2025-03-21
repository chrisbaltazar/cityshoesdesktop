<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\Enums\Sizes;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word(),
            'size' => $this->faker->randomElement(Sizes::cases()),
            'price' => $this->faker->randomFloat(0, 99, 500),
        ];
    }
}

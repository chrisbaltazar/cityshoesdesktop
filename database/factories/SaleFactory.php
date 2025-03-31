<?php

namespace Database\Factories;

use App\Models\Enums\Payments;
use App\Models\Enums\SaleTypes;
use App\Models\Sale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{

    protected $model = Sale::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(SaleTypes::values()),
            'payment' => $this->faker->randomElement(Payments::values()),
            'reference' => $this->faker->uuid(),
            'store_id' => $this->faker->numberBetween(1, 10),
            'staff_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}

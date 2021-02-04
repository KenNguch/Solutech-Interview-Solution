<?php

namespace Database\Factories;

use App\Models\SupplierProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class SupplierProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SupplierProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'supply_id' => $this->faker->numberBetween($min = 1, $max = 50),
            'product_id' => $this->faker->numberBetween($min = 1, $max = 50),
        ];
    }
}

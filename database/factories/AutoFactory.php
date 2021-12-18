<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AutoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vin' => $this->faker->name(),
            'model' => $this->faker->name(),
            'brand' => $this->faker->name(),
            'color' => $this->faker->name(),
            'eco' => $this->faker->numberBetween(1, 5),
            'user_id' => $this->faker->numberBetween(1, 1),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

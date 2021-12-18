<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'date' => $this->faker->date(),
            'wight' => $this->faker->numberBetween(200,1000),
            'code' => $this->faker->numberBetween(200,1000),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,

        ];
    }
}

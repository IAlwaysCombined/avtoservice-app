<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'decs' => $this->faker->text(),
            'autos_id' => $this->faker->numberBetween(1, 10),
            'employees_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

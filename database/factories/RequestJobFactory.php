<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RequestJobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'pass' => $this->faker->password(),
            'passport_series' => $this->faker->password(),
            'passport_number' => $this->faker->password(),
            'date' => $this->faker->dateTime(),
            'depart' => $this->faker->word(),
            'depart_code' => $this->faker->word(),
            'date_accept' => $this->faker->dateTime(),
            'positions_id' => $this->faker->numberBetween(1, 9),
            'education_id' => $this->faker->numberBetween(1, 9),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

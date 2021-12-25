<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
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
            'depart' => $this->faker->word(),
            'depart_code' => $this->faker->word(),
            'positions_id' => $this->faker->numberBetween(1, 10),
            'education_id' => $this->faker->numberBetween(1, 10),
            'solutions_id' => $this->faker->numberBetween(1, 10),
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}

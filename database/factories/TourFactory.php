<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TourFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(20),
            'description' => $this->faker->text(200),
            'price' => $this->faker->randomNumber(6),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Tour;

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
            'short_description' => $this->faker->text(200),
            'description' => $this->faker->text(1000),
            'type' => $this->faker->randomElement(array_keys(Tour::TYPES)),
            'price' => $this->faker->randomNumber(6),
            'start_date' => $this->faker->dateTime(),
            'end_date' => $this->faker->dateTime(),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

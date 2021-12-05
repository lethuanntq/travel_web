<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
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
            'type' => $this->faker->randomElement(array_keys(Post::TYPES)),
            'created_by' => 1,
            'updated_by' => 1,
        ];
    }
}

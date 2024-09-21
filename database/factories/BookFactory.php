<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(3), // Generates a random book title with 3 words
            'author' => $this->faker->name, // Generates a random author name
            'quantity' => $this->faker->numberBetween(1, 20), // Generates a random number for quantity (between 1 and 20)
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'username' => fake()->unique()->userName(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'administrator' => fake()->boolean(),
            'name' => fake()->firstName(),
            'surname' => fake()->lastName(),
            'job' => fake()->jobTitle(),
            'wage' => fake()->numberBetween(1000, 10000),
            'room_id' => fake()->numberBetween(1, 9),
        ];
    }
}

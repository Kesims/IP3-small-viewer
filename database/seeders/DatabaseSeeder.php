<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Room::factory(10)->create();

//        \App\Models\User::create([
//            'username' => 'admin',
//            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
//            'administrator' => true,
//            'name' => fake()->firstName(),
//            'surname' => fake()->lastName(),
//            'job' => fake()->jobTitle(),
//            'wage' => fake()->numberBetween(1000, 10000),
//            'room' => fake()->numberBetween(1, 9),
//        ]);

        \App\Models\User::factory(9)->create();
        \App\Models\Key::factory(8)->create();
    }
}

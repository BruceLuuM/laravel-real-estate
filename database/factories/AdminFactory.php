<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Admin>
 */
class AdminFactory extends Factory
{
    /**
     * Define the model's default state.s
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'phonenumber' => fake()->unique()->phoneNumber(),
            'roles' => $this->faker->randomElement([0, 1]),
            'email_verified_at' => now(),
            'password' => '$2y$10$CreTM/JRBd3Yss09lloy8.Lq/NPbWfihBVOAEcI4kI.Ro/bn8gpjS',
            'remember_token' => Str::random(10),
        ];
    }
}

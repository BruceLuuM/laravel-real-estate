<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InvesterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'brief' => $this->faker->paragraph(2),
            'description' => $this->faker->paragraph(5),
            'nums_project' => $this->faker->numberBetween(10, 20),
            'invester_logo' => '',
        ];
    }
}

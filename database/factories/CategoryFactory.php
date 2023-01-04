<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'purpose' => $this->faker->randomElement(['Bán', 'Cho thuê']),
            'type' => 'test type',
            'type_name' => 'test type name',
            'slug' => 'test-type-slug',
            'description' => 'test description',
        ];
    }
}

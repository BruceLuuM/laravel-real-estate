<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'invester_id' => $this->faker->numberBetween(1, 2),
            'category_id' => $this->faker->numberBetween(1, 11),
            'province_id' =>  $this->faker->randomElement([1, 2, 4, 6, 8]),
            'district_id' => $this->faker->numberBetween(1, 11),
            'ward_id' => $this->faker->randomElement([1, 4, 6, 7, 8]),
            'name' => 'test name',
            'area' => $this->faker->numberBetween(10, 200),
            'area_unit' => $this->faker->randomElement(['m^2', 'km^2', 'ha']),
            'description' => $this->faker->paragraph(5),
            'images' => '',
        ];
    }
}

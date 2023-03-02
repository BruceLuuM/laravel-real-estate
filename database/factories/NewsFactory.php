<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => '0',
            'category_id' => '1',
            'ward_id' => '1',
            'district_id' => '1',
            'province_id' => '1',
            'address' => 'test address',
            'area' => $this->faker->numberBetween(10, 200),
            'area_unit' => $this->faker->randomElement(['m^2', 'km^2', 'ha']),
            'price' => $this->faker->numberBetween(100, 200),
            'price_unit' => $this->faker->randomElement(['triệu', 'tỉ']),
            'news_header' => 'test news_header',
            'slug' => Str::slug('test news_header'),
            'description' => $this->faker->paragraph(5),
            'attribute' => 'test attribute',
            'num_bed_rooms' => $this->faker->numberBetween(1, 5),
            'num_wc_rooms' => $this->faker->numberBetween(1, 5),
            'law_related_info' => 'test law_related_info',
            'images' => '',
        ];
    }
}

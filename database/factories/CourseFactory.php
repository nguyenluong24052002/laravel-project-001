<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \App\Models\Course::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'slug' => $this->faker->unique()->slug,
            'link' => $this->faker->url,
            'price' => $this->faker->randomFloat(2, 1, 1000),
            'old_price' => $this->faker->randomFloat(2, 1, 1000),
            'created_by' => $this->faker->randomNumber(),
            'category_id' => $this->faker->randomNumber(),
            'lessons' => $this->faker->randomNumber(),
            'view_count' => $this->faker->randomNumber(),
            'benefits' => json_encode($this->faker->paragraph),
            'fqa' => json_encode($this->faker->paragraph),
            'is_feature' => $this->faker->boolean,
            'is_online' => $this->faker->boolean,
            'description' => $this->faker->paragraph,
            'content' => $this->faker->paragraph,
            'meta_title' => $this->faker->sentence,
            'meta_desc' => $this->faker->paragraph,
            'meta_keyword' => 'meta_keyword 1',
        ];
    }
}

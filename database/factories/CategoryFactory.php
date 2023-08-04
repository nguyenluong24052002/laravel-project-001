<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $name = $this->faker->name;
        $slug = Str::slug($name.'-'.Str::random(5));

        return [
            'name' => fake()->name,
            'slug' => $slug,
            'parent' => 1,
            'created_by' => 1,
            'content' => fake()->paragraph,
            'meta_tile' => fake()->title,
            'meta_desc' => fake()->paragraph,
            'meta_keyword' => 'meta_keyword 1',
        ];
    }
}

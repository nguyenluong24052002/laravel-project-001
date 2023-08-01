<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'course_id' => fake()->numberBetween(1, 20),
            'section_id' => fake()->numberBetween(1, 20),
            'video_type' => fake()->numberBetween(1, 4),
            'video_url' => fake()->url,
            'time' => fake()->time,
            'preview' => fake()->numberBetween(1, 9),
            'content' => fake()->paragraph
        ];
    }
}
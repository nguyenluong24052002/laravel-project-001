<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attachment>
 */
class AttachmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'file_path' => $this->faker->url,
            'attachable_type' => $this->faker->randomNumber(),
            'file_name' => $this->faker->fileExtension,
            'attachable_id' => 1,
            'extension' => $this->faker->fileExtension,
            'mime_type' => $this->faker->mimeType,
            'size' => '10000'
        ];
    }
}

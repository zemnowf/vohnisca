<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Note>
 */
class NoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->word(),
            "text" => $this->faker->sentence(10, 20),
            "image" => $this->faker->file(
                storage_path('app/public/files'),
                storage_path('app/public/campaigns'),
                false),
            "text_parts" => $this->faker->paragraph(5),
            "sort" => $this->faker->numberBetween(0, 100),
        ];
    }
}

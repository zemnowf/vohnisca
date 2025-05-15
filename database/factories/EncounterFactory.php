<?php

namespace Database\Factories;

use App\Models\Note;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Encounter>
 */
class EncounterFactory extends Factory
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
            "short_description" => $this->faker->sentence(10, 20),
            "description" => $this->faker->paragraph(5),
            "image" => $this->faker->file(
                storage_path('app/public/files'),
                storage_path('app/public/encounters'),
                false),
            "text_parts" => $this->faker->paragraph(5),
            "sort" => $this->faker->numberBetween(0, 100),
        ];
    }

}

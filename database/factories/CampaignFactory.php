<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Campaign>
 */
class CampaignFactory extends Factory
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
            "preview_image" => $this->faker->file(
                storage_path('app/public/files'),
                storage_path('app/public/campaigns'),
                false),
        ];
    }
}

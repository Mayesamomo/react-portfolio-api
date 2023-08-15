<?php

namespace Database\Factories;

use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence,
            'screenshot' => $this->faker->imageUrl(),
            'url' => $this->faker->url,
            'blurb' => $this->faker->paragraph,
            'github_link' => $this->faker->url,
            'tags' =>Tag::factory()->create()->pluck('id'),
            'user_id' => User::factory()->create(),
        ];
    }
}


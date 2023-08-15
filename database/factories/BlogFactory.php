<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Blog>
 */
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'image' => $this->faker->imageUrl,
            'content' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->slug,
            'user_id' =>User::factory()->create(),
            'category_id' =>Category::factory(),
            'published_at' => $this->faker->dateTime,
        ];
    }
}

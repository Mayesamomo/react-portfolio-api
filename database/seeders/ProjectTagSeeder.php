<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::all()->each(function ($project) {
            $tags = Tag::inRandomOrder()->take(rand(1, 5))->pluck('id');
            $project->tags()->sync($tags);
        });
    }
}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::factory()
        ->count(10)
        ->hasAttached(Tag::factory()->count(rand(1, 5)))
        ->create();
    }
}


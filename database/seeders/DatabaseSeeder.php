<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Blog;
use App\Models\User;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\UsersTableSeeder;
use Database\Seeders\ProjectsTableSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
       
// Disable foreign key checks
DB::statement('SET FOREIGN_KEY_CHECKS=0');

// Truncate tables in the correct order
DB::table('projects')->truncate();
DB::table('users')->truncate();
DB::table('blogs')->truncate();
 DB::table('categories')->truncate();

// Enable foreign key checks
DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        User::factory()->count(1)->create();
        Tag::factory()->count(2)->create();
        Project::factory()->count(4)->create(); 
        Blog::factory()->count(5)->create();
        Category::factory()->count(3)->create();
    }
}

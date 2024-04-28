<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Part;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory()->create([
            'name' => 'روايات',
            'slug' => 'novels',
        ]);
        Category::factory()->create([
            'name' => 'رسومات',
            'slug' => 'drawings',
        ]);
        Category::factory()->create([
            'name' => 'خواطر',
            'slug' => 'thoughts',
        ]);
        Category::factory()->create([
            'name' => 'قصص قصيرة',
            'slug' => 'stories',
        ]);
        User::factory(10)->create();
        Post::factory(50)->create([
            "user_id"=> 1,
        ]);
        Comment::factory(10)->create();
        Part::factory(10)->create();
    }
}

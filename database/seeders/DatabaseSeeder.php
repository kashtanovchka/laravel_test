<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder
    extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void {

        //$post = Post::factory(10)->make();
        //dd($post);
        Category::factory(20)->create();
        $tags = Tag::factory(50)->create();
        $posts = Post::factory(100)->create();

        foreach($posts as $post){
            $tagsIds = $tags->random(5)->pluck('id');
            $post->tags()->attach($tagsIds);
        }

        // User::factory(10)->create();

        //User::factory()->create([
        //    'name' => 'Test User',
        //    'email' => 'test@example.com',
        //]);
    }
}
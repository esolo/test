<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Audio;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(10)->create();
        Audio::factory(5)->create()->each(function ($item) use ($posts) {
            $item->posts()->attach($posts->random(fn($items)=>rand(1,count($items))));
        });
        Video::factory(5)->create()->each(function ($item) use ($posts) {
            $item->posts()->attach($posts->random(fn($items)=>rand(1,count($items))));
        });
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

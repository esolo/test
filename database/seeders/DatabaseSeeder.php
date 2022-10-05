<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Phone;
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
        \App\Models\User::factory(10)->create();
        \App\Models\Phone::factory(10)->create();
        \App\Models\Post::factory(50)->create();

        \App\Models\Category::insert([
            ['name'=>'economics'],
            ['name'=>'politics'],
            ['name'=>'sport']
        ]);

        \DB::table('category_post')->insert([
            ['category_id'=>1, 'post_id'=>1],
            ['category_id'=>1, 'post_id'=>2],
            ['category_id'=>1, 'post_id'=>3],
            ['category_id'=>2, 'post_id'=>1],
            ['category_id'=>2, 'post_id'=>2],
            ['category_id'=>3, 'post_id'=>1],
        ]);

        \App\Models\Comment::factory(150)->create();

        \App\Models\Mechanic::factory(10)->create();
        \App\Models\Car::factory(10)->create();
        \App\Models\Owner::factory(10)->create();




        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

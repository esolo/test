<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'created_at' => now(),
            'updated_at' => null,
            'content' => ucfirst( fake()->words(rand(3, 10), true) ),
            'post_id' => Post::select('id')->inRandomOrder()->first()->id,

        ];
    }
}

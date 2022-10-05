<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'content' => ucfirst(fake()->words(rand(10, 35), true) ),
            'user_id' => User::select('id')->inRandomOrder()->first()->id,
            'created_at' => now(),
            'updated_at' => null,
        ];
    }
}

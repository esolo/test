<?php

namespace Database\Factories;

use App\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Null_;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Owner>
 */
class OwnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(empty($this->car_id))
        {
            $this->car_id = Car::pluck('id')->shuffle();
        }

        return [
            'name' => fake()->name,
//            'car_id' => Car::select('id')->inRandomOrder()->first()->id,
            'car_id' => $this->car_id->pop(),
        ];
    }
}

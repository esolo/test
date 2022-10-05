<?php

namespace Database\Factories;

use App\Models\Mechanic;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Collection;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if(empty($this->car_name))
        {
            $this->car_name = Collection::make(['Acura', 'Alfa Romeo', 'Aston Martin', 'Audi', 'Bentley', 'BMW', 'Buick', 'Cadillac', 'Chevrolet', 'Honda'])->shuffle();
        }

        if(empty($this->car_id))
        {
            $this->car_id = Mechanic::pluck('id')->shuffle();
        }

        return [
//            'model' => fake()->name,
            'model' => $this->car_name->pop(),
//            'mechanic_id' => Mechanic::select('id')->inRandomOrder()->first()->id,
            'mechanic_id' => $this->car_id->pop(),
        ];
    }
}

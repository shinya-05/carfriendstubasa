<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Car;

class CarImageFactory extends Factory
{
    public function definition()
    {
        return [
            'car_id' => Car::inRandomOrder()->first()->id ?? Car::factory(),
            'image_path' => 'https://placehold.jp/600x400.png?text=CAR_IMG',
            'sort_order' => $this->faker->numberBetween(0, 5),
        ];
    }
}

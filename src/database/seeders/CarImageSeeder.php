<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;
use App\Models\CarImage;

class CarImageSeeder extends Seeder
{
    public function run()
    {
        $cars = Car::all();

        foreach ($cars as $car) {
            $imageCount = rand(3, 6); // 1台につき3〜6枚

            for ($i = 0; $i < $imageCount; $i++) {
                CarImage::create([
                    'car_id' => $car->id,
                    'image_path' => "https://placehold.jp/600x400.png?text=CAR+{$car->id}+IMG".($i+1),
                    'sort_order' => $i,
                ]);
            }
        }
    }
}

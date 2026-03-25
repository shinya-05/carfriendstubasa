<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    public function definition()
    {
        return [
            'maker' => $this->faker->randomElement(['トヨタ', '日産', 'ホンダ', 'スバル', 'BMW', 'メルセデス']),
            'car_name' => $this->faker->randomElement(['プリウス', 'セレナ', 'N-BOX', '3シリーズ', 'Cクラス']),
            'grade' => $this->faker->randomElement(['S', 'G', 'X', 'Lパッケージ', '標準', null]),

            'model_year' => $this->faker->year(),
            'first_registration' => $this->faker->date(),
            'mileage' => $this->faker->numberBetween(1000, 150000),
            'color' => $this->faker->safeColorName(),
            'body_type' => $this->faker->randomElement(['セダン', 'ミニバン', '軽自動車', 'SUV']),

            'engine_type' => $this->faker->randomElement(['ガソリン', 'ハイブリッド', 'EV']),
            'displacement' => $this->faker->numberBetween(660, 3500),
            'drive_system' => $this->faker->randomElement(['2WD', '4WD']),
            'transmission' => $this->faker->randomElement(['AT', 'CVT', 'MT']),

            'inspection_expiry' => $this->faker->date(),
            'repair_history' => $this->faker->boolean(),
            'one_owner' => $this->faker->boolean(),
            'non_smoking' => $this->faker->boolean(),
            'recycle_fee' => $this->faker->numberBetween(5000, 20000),

            'price' => $this->faker->numberBetween(200000, 5000000),
            'total_price' => $this->faker->numberBetween(300000, 5500000),
            'tax_included' => true,

            'description' => $this->faker->realText(150),

            'main_image' => 'https://placehold.jp/600x400.png?text=CAR',
            'images_json' => json_encode([
                'https://placehold.jp/600x400.png?text=CAR1',
                'https://placehold.jp/600x400.png?text=CAR2',
                'https://placehold.jp/600x400.png?text=CAR3',
            ]),

            'status' => $this->faker->randomElement(['available', 'sold', 'hidden']),
            'featured' => $this->faker->boolean(),
            'stock_number' => strtoupper($this->faker->bothify('TS-###??')),
        ];
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{
    public function run()
    {
        // まず確実にトップに出す特選車を6台作る
        Car::factory()->count(6)->create([
            'featured' => true,
            'status' => 'available',
        ]);

        // 残りは自由にランダムで作成
        Car::factory()->count(100)->create();
    }

}

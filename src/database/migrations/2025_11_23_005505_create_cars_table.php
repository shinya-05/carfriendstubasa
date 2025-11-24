<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();

            // 基本情報
            $table->string('maker');
            $table->string('car_name');
            $table->string('grade')->nullable();

            // 年式・走行など
            $table->year('model_year')->nullable();
            $table->date('first_registration')->nullable();
            $table->integer('mileage')->nullable();
            $table->string('color')->nullable();
            $table->string('body_type')->nullable();

            // エンジン関連
            $table->string('engine_type')->nullable(); // ガソリン/ハイブリッド/EV
            $table->integer('displacement')->nullable(); // cc
            $table->string('drive_system')->nullable(); // 2WD/4WD
            $table->string('transmission')->nullable(); // AT/MT/CVT

            // 車検・状態
            $table->date('inspection_expiry')->nullable();
            $table->boolean('repair_history')->default(false);
            $table->boolean('one_owner')->default(false);
            $table->boolean('non_smoking')->default(false);
            $table->integer('recycle_fee')->nullable();

            // 価格
            $table->integer('price')->nullable();
            $table->integer('total_price')->nullable();
            $table->boolean('tax_included')->default(true);

            // 説明
            $table->text('description')->nullable();

            // 画像
            $table->string('main_image')->nullable();
            $table->json('images_json')->nullable();

            // 状態
            $table->string('status')->default('available'); // available/sold/hidden
            $table->boolean('featured')->default(false);
            $table->string('stock_number')->nullable(); // 管理番号

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('assessments', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('phone');
            $table->string('email');

            // 車両情報
            $table->string('car_maker');
            $table->string('car_name');
            $table->year('year')->nullable();
            $table->integer('mileage')->nullable();
            $table->text('condition')->nullable();
            $table->text('message')->nullable();

            $table->string('status')->default('new');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assessments');
    }
};

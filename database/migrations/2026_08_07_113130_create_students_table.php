<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Anuwat_Suriyon', function (Blueprint $table) {
            // คอลัมน์ id เริ่มต้นของ Laravel (Primary Key)
            $table->id();

            // 5 คอลัมน์ที่คุณกำหนด (ตั้งเป็น nullable ทั้งหมด)
            $table->integer('age')->nullable();
            $table->float('weight')->nullable();
            $table->string('note')->nullable();
            $table->date('date')->nullable();
            $table->text('remark')->nullable();

            // คอลัมน์ created_at และ updated_at เริ่มต้นของ Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};

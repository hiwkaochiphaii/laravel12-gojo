<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // 1. ต้องเพิ่มบรรทัดนี้เพื่อใช้งาน DB::table()

return new class extends Migration
{
    public function up(): void
    {
        // 2. ต้องสร้างตาราง (Create) ก่อน
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->integer('age')->nullable();
            $table->float('weight')->nullable();
            $table->string('note')->nullable();
            $table->date('date')->nullable();
            $table->text('remark')->nullable();
            $table->timestamps();
        });

        // 3. หลังจากสร้างตารางเสร็จ ค่อยสั่งเพิ่มข้อมูล (Insert)
        DB::table('students')->insert([
            [
                'age' => 20,
                'weight' => 65.5,
                'note' => 'ทดสอบใส่ข้อมูลคนที่ 1',
                'date' => '2026-08-07',
                'remark' => 'บันทึกเพิ่มเติม...',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('students');
    }
}; // 4. วงเล็บปิดคลาสต้องอยู่ตรงนี้ล่างสุดที่เดียวครับ
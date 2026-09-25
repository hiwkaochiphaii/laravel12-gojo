<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position');
            $table->string('department');
            $table->decimal('salary', 12, 2)->default(0);
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('photo')->nullable(); // path in storage/app/public/employees
            $table->date('hired_at')->nullable();
            $table->timestamps();

            $table->index(['department', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

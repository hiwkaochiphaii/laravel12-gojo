<?php
/*
|--------------------------------------------------------------------------
| เพิ่มโค้ดนี้เข้าไปใน routes/web.php ของโปรเจกต์คุณ
|--------------------------------------------------------------------------
| 1. เพิ่ม use statement ด้านบนไฟล์ (ใต้ use อื่น ๆ)
| 2. เพิ่ม Route::resource ไว้ในกลุ่ม middleware(['auth']) เดียวกับที่ Breeze
|    สร้างไว้ให้ (โดยปกติจะครอบ /dashboard และ /profile อยู่แล้ว)
*/

use App\Http\Controllers\EmployeeController;

Route::middleware(['auth'])->group(function () {
    Route::resource('employees', EmployeeController::class);
});

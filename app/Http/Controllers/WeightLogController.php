<?php

namespace App\Http\Controllers;
use App\Models\WeightLog;
use Illuminate\Http\Request;

class WeightLogController extends Controller
{
    // แสดงรายการข้อมูลและกราฟ
    public function index()
    {
        $logs = WeightLog::orderBy('recorded_at', 'asc')->get();
        return view('weights.index', compact('logs'));
    }

    // บันทึกข้อมูลใหม่ (Create)
    public function store(Request $request)
    {
        $request->validate([
            'weight' => 'required|numeric|between:20,300',
            'recorded_at' => 'required|date',
            'note' => 'nullable|string|max:255',
        ], [
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.numeric' => 'น้ำหนักต้องเป็นตัวเลขเท่านั้น',
            'weight.between' => 'น้ำหนักต้องอยู่ระหว่าง 20 - 300 กิโลกรัม',
            'recorded_at.required' => 'กรุณาระบุวันที่บันทึก',
            'recorded_at.date' => 'รูปแบบวันที่ไม่ถูกต้อง',
            'note.max' => 'หมายเหตุต้องไม่เกิน 255 ตัวอักษร',
        ]);

        WeightLog::create($request->all());

        return redirect()->route('weights.index')->with('success', 'บันทึกข้อมูลน้ำหนักเรียบร้อยแล้ว');
    }

    // แก้ไขข้อมูล (Update)
    public function update(Request $request, WeightLog $weight)
    {
        $request->validate([
            'weight' => 'required|numeric|between:20,300',
            'recorded_at' => 'required|date',
            'note' => 'nullable|string|max:255',
        ], [
            'weight.required' => 'กรุณากรอกน้ำหนัก',
            'weight.numeric' => 'น้ำหนักต้องเป็นตัวเลขเท่านั้น',
            'weight.between' => 'น้ำหนักต้องอยู่ระหว่าง 20 - 300 กิโลกรัม',
            'recorded_at.required' => 'กรุณาระบุวันที่บันทึก',
            'recorded_at.date' => 'รูปแบบวันที่ไม่ถูกต้อง',
        ]);

        $weight->update($request->all());

        return redirect()->route('weights.index')->with('success', 'อัปเดตข้อมูลเรียบร้อยแล้ว');
    }

    // ลบข้อมูล (Delete)
    public function destroy(WeightLog $weight)
    {
        $weight->delete();

        return redirect()->route('weights.index')->with('success', 'ลบข้อมูลเรียบร้อยแล้ว');
    }
}
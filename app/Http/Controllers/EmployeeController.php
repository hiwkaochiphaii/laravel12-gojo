<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * แสดงรายการพนักงาน พร้อมค้นหา (ชื่อ) และกรอง (แผนก/ตำแหน่ง)
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%");
        }

        if ($department = $request->input('department')) {
            $query->where('department', $department);
        }

        if ($position = $request->input('position')) {
            $query->where('position', 'like', "%{$position}%");
        }

        $employees = $query->orderBy('name')->paginate(10)->withQueryString();

        // สำหรับ dropdown filter แผนก (distinct list จากข้อมูลที่มีอยู่จริง)
        $departments = Employee::query()
            ->select('department')
            ->distinct()
            ->orderBy('department')
            ->pluck('department');

        return view('employees.index', compact('employees', 'departments'));
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateEmployee($request);

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('employees', 'public');
        }

        Employee::create($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'เพิ่มข้อมูลพนักงานเรียบร้อยแล้ว');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee)
    {
        $validated = $this->validateEmployee($request, $employee->id);

        if ($request->hasFile('photo')) {
            // ลบรูปเก่าถ้ามี
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $validated['photo'] = $request->file('photo')->store('employees', 'public');
        }

        $employee->update($validated);

        return redirect()
            ->route('employees.index')
            ->with('success', 'แก้ไขข้อมูลพนักงานเรียบร้อยแล้ว');
    }

    public function destroy(Employee $employee)
    {
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }

        $employee->delete();

        return redirect()
            ->route('employees.index')
            ->with('success', 'ลบข้อมูลพนักงานเรียบร้อยแล้ว');
    }

    private function validateEmployee(Request $request, ?int $ignoreId = null): array
    {
        return $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'position'   => ['required', 'string', 'max:255'],
            'department' => ['required', 'string', 'max:255'],
            'salary'     => ['required', 'numeric', 'min:0'],
            'email'      => ['nullable', 'email', 'max:255'],
            'phone'      => ['nullable', 'string', 'max:30'],
            'hired_at'   => ['nullable', 'date'],
            'photo'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);
    }
}

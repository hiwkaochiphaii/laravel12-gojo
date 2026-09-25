@csrf

<div class="grid grid-cols-1 md:grid-cols-2 gap-6">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">ชื่อ-นามสกุล</label>
        <input type="text" name="name" value="{{ old('name', $employee->name ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('name') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">ตำแหน่ง</label>
        <input type="text" name="position" value="{{ old('position', $employee->position ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('position') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">แผนก</label>
        <input type="text" name="department" value="{{ old('department', $employee->department ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('department') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">เงินเดือน</label>
        <input type="number" step="0.01" name="salary" value="{{ old('salary', $employee->salary ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('salary') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">อีเมล</label>
        <input type="email" name="email" value="{{ old('email', $employee->email ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('email') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">เบอร์โทร</label>
        <input type="text" name="phone" value="{{ old('phone', $employee->phone ?? '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('phone') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">วันที่เริ่มงาน</label>
        <input type="date" name="hired_at"
               value="{{ old('hired_at', isset($employee->hired_at) ? $employee->hired_at->format('Y-m-d') : '') }}"
               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
        @error('hired_at') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">รูปโปรไฟล์</label>
        <input type="file" name="photo" accept="image/*"
               class="w-full text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
        @error('photo') <p class="text-sm text-red-600 mt-1">{{ $message }}</p> @enderror

        @if (!empty($employee->photo_url))
            <img src="{{ $employee->photo_url }}" class="mt-3 w-20 h-20 rounded-full object-cover">
        @endif
    </div>

</div>

<div class="mt-6 flex justify-end gap-3">
    <a href="{{ route('employees.index') }}"
       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300">ยกเลิก</a>
    <button type="submit"
            class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">บันทึก</button>
</div>

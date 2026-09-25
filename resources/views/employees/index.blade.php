<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                จัดการข้อมูลพนักงาน
            </h2>
            <a href="{{ route('employees.create') }}"
               class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                + เพิ่มพนักงาน
            </a>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-md">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow p-4 mb-6">
                <form method="GET" action="{{ route('employees.index') }}"
                      class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm text-gray-600 mb-1">ค้นหาชื่อ</label>
                        <input type="text" name="search" value="{{ request('search') }}"
                               placeholder="ชื่อพนักงาน..."
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">แผนก</label>
                        <select name="department"
                                class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <option value="">ทั้งหมด</option>
                            @foreach ($departments as $dept)
                                <option value="{{ $dept }}" @selected(request('department') === $dept)>
                                    {{ $dept }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm text-gray-600 mb-1">ตำแหน่ง</label>
                        <input type="text" name="position" value="{{ request('position') }}"
                               placeholder="ตำแหน่ง..."
                               class="w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                    </div>

                    <div class="flex items-end gap-2">
                        <button type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-md text-sm hover:bg-gray-900">
                            ค้นหา
                        </button>
                        <a href="{{ route('employees.index') }}"
                           class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300">
                            ล้างค่า
                        </a>
                    </div>
                </form>
            </div>

            <div class="bg-white rounded-lg shadow overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">รูป</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ชื่อ</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">ตำแหน่ง</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">แผนก</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">เงินเดือน</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-gray-500 uppercase">จัดการ</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @forelse ($employees as $employee)
                            <tr>
                                <td class="px-4 py-3">
                                    @if ($employee->photo_url)
                                        <img src="{{ $employee->photo_url }}" class="w-10 h-10 rounded-full object-cover">
                                    @else
                                        <div class="w-10 h-10 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xs">
                                            {{ mb_substr($employee->name, 0, 1) }}
                                        </div>
                                    @endif
                                </td>
                                <td class="px-4 py-3 font-medium text-gray-800">
                                    <a href="{{ route('employees.show', $employee) }}" class="hover:underline">
                                        {{ $employee->name }}
                                    </a>
                                </td>
                                <td class="px-4 py-3 text-gray-600">{{ $employee->position }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ $employee->department }}</td>
                                <td class="px-4 py-3 text-gray-600">{{ number_format($employee->salary, 2) }}</td>
                                <td class="px-4 py-3 text-right space-x-2 whitespace-nowrap">
                                    <a href="{{ route('employees.edit', $employee) }}"
                                       class="text-indigo-600 hover:underline text-sm">แก้ไข</a>
                                    <form action="{{ route('employees.destroy', $employee) }}" method="POST"
                                          class="inline"
                                          onsubmit="return confirm('ยืนยันการลบข้อมูลพนักงานนี้?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline text-sm">ลบ</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                    ไม่พบข้อมูลพนักงาน
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-4">
                {{ $employees->links() }}
            </div>

        </div>
    </div>
</x-app-layout>

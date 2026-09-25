<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">รายละเอียดพนักงาน</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">

                <div class="flex items-center gap-4 mb-6">
                    @if ($employee->photo_url)
                        <img src="{{ $employee->photo_url }}" class="w-20 h-20 rounded-full object-cover">
                    @else
                        <div class="w-20 h-20 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 text-xl">
                            {{ mb_substr($employee->name, 0, 1) }}
                        </div>
                    @endif
                    <div>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $employee->name }}</h3>
                        <p class="text-gray-500">{{ $employee->position }} · {{ $employee->department }}</p>
                    </div>
                </div>

                <dl class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <dt class="text-gray-500">เงินเดือน</dt>
                        <dd class="text-gray-800 font-medium">{{ number_format($employee->salary, 2) }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">อีเมล</dt>
                        <dd class="text-gray-800 font-medium">{{ $employee->email ?: '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">เบอร์โทร</dt>
                        <dd class="text-gray-800 font-medium">{{ $employee->phone ?: '-' }}</dd>
                    </div>
                    <div>
                        <dt class="text-gray-500">วันที่เริ่มงาน</dt>
                        <dd class="text-gray-800 font-medium">
                            {{ $employee->hired_at?->format('d/m/Y') ?: '-' }}
                        </dd>
                    </div>
                </dl>

                <div class="mt-6 flex justify-end gap-3">
                    <a href="{{ route('employees.index') }}"
                       class="px-4 py-2 bg-gray-200 text-gray-700 rounded-md text-sm hover:bg-gray-300">
                        กลับ
                    </a>
                    <a href="{{ route('employees.edit', $employee) }}"
                       class="px-4 py-2 bg-indigo-600 text-white rounded-md text-sm hover:bg-indigo-700">
                        แก้ไข
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>

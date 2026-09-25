<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-1">ระบบจัดการพนักงาน</h3>
                    <p class="text-sm text-gray-500 mb-4">
                        ดูรายชื่อพนักงาน เพิ่ม แก้ไข หรือลบข้อมูลได้ที่นี่ (ผู้ใช้ที่ login ทุกคนเข้าถึงได้)
                    </p>
                    <a href="{{ route('employees.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700">
                        ไปที่หน้า Employees
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">เพิ่มข้อมูลพนักงาน</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow p-6">
                <form method="POST" action="{{ route('employees.store') }}" enctype="multipart/form-data">
                    @include('employees._form')
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

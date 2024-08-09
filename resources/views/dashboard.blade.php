<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
        <h1 class="text-center text-3xl font-bold mb-8 text-gray-800 dark:text-gray-200">Informasi Instansi</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1: Saldo yang Dikeluarkan -->

            <!-- Card 2: Jumlah Karyawan -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                <div class="p-6  items-center">
                    <div class="flex justify-center">
                        <i class="fas fa-users text-4xl text-blue-500 dark:text-blue-400"></i>
                    </div>
                    <div class="mt-2">
                        <h2 class="text-center text-xl font-semibold text-gray-800 dark:text-gray-100">Jumlah Karyawan</h2>
                        <p class="text-center text-3xl font-bold text-blue-500 dark:text-blue-400 mt-2">{{$totalKaryawan}}</p>
                        <p class="text-center text-gray-600 dark:text-gray-300 mt-2">Jumlah total karyawan yang terdaftar saat ini.</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Jumlah Pajak yang Dipotong -->
        </div>
    </div>

</x-app-layout>

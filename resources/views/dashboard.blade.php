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
            <div class="bg-gradient-to-r from-blue-500 to-blue-700 dark:from-blue-700 dark:to-blue-900 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 items-center">
                    <div class="flex justify-center">
                        <i class="fas fa-users text-5xl text-white"></i>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-center text-2xl font-semibold text-white">Jumlah Karyawan</h2>
                        <p class="text-center text-4xl font-bold text-white mt-2">{{$totalKaryawan}}</p>
                        <p class="text-center text-white mt-2">Jumlah total karyawan yang terdaftar saat ini.</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-green-500 to-green-700 dark:from-green-700 dark:to-green-900 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 items-center">
                    <div class="flex justify-center">
                        <i class="fas fa-money-bill-wave text-5xl text-white"></i>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-center text-2xl font-semibold text-white">Ringksan Pajak Potong</h2>
                        <p class="text-center text-4xl font-bold text-white mt-2">Rp {{ number_format($totalPajak, 0, ',', '.') }}</p>
                        <p class="text-center text-white mt-2">Total Pajak yang sudah di potong</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-r from-red-500 to-red-700 dark:from-red-700 dark:to-red-900 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 items-center">
                    <div class="flex justify-center">
                        <i class="fas fa-wallet text-5xl text-white"></i>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-center text-2xl font-semibold text-white">Ringkasan Pajak Setor</h2>
                        <p class="text-center text-4xl font-bold text-white mt-2">Rp {{ number_format($totalSetor, 0, ',', '.') }}</p>
                        <p class="text-center text-white mt-2">Total Pajak yang sudah di Setor</p>
                    </div>
                </div>
            </div>

            <!-- Card 3: Jumlah Pajak yang Dipotong -->
        </div>
    </div>

</x-app-layout>

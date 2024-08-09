<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Karyawan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
    <div class="flex items-center justify-between mb-4 w-full">
        <h1 class="text-2xl font-bold text-white text-center">Tambah Karyawan</h1>
    </div>
    <form action="{{ route('karyawan.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nama</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}" required
                class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required
                class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
            @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Password</label>
            <input type="text" id="password" name="password" value="{{ old('password') }}" required
                class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
            @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="role" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Role</label>
            <select id="role" name="role" required
                class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                <option value="karyawan">Karyawan</option>
                <option value="admin">Admin</option>
                <option value="pajak">Pajak</option>
            </select>
            @error('role')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('karyawan.index') }}" class="ml-4 text-blue-500 hover:underline">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Simpan</button>
        </div>
    </form>
    </div>
</x-app-layout>
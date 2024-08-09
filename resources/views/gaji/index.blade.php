<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Gaji') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-white">Daftar Gaji</h1>
        <a href="{{ route('gaji.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600"> + </a>
    </div>

    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">ID</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Nama</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Mutu Gaji</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Potongan</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Jabatan</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Take Home Pay</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Dibuat</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $gaji)
            <tr>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->id }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->nama }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->mutu_gaji }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->pph23 }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->jabatan }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->thp }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->created_at }}</td>
                <td class="py-2 px-4 border-b flex space-x-2 justify-center">
                    <a href="{{ route('gaji.edit', $gaji->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('gaji.destroy', $gaji->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-red-600">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
</x-app-layout>
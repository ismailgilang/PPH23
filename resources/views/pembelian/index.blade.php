<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Pembelian') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-white">Daftar Pembelian</h1>
        <a href="{{ route('pembelian.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600"> + </a>
    </div>

    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
        <thead>
            <tr>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">ID</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Invoice</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Nama</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Kontak</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">product</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">harga</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">PPH</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">status</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Dibuat</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $pembelian)
            <tr>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->id }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->invoice }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->name }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->nohp }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->product }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->harga }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->hargapph }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->status }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->created_at }}</td>
                <td class="py-2 px-4 border-b flex space-x-2 justify-center">
                    <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
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
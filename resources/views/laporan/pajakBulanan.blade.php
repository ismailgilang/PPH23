<x-app-layout>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.3/css/dataTables.dataTables.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.1.1/css/buttons.dataTables.css">
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.1.3/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/dataTables.buttons.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.dataTables.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/3.1.1/js/buttons.print.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Laporan Bulanan') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
    <div class="flex items-center justify-between mb-4">
        <h1 class="text-2xl font-bold text-white">Laporan Pajak Bulanan</h1>
    </div>

    <div class="overflow-x-auto">
    <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md" id="example">
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
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Setor PPH</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Dibuat</th>
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
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->setorpph }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
            <div class="bg-gradient-to-r from-red-500 to-red-700 dark:from-red-700 dark:to-red-900 rounded-lg shadow-lg overflow-hidden">
                <div class="p-6 items-center">
                    <div class="flex justify-center">
                        <i class="fas fa-money-bill-wave text-5xl text-white"></i>
                    </div>
                    <div class="mt-4">
                        <h2 class="text-center text-2xl font-semibold text-white">Ringksan Pajak Potong dan setor</h2>
                        <p class="text-center text-4xl font-bold text-white mt-2">Rp {{ number_format($totalHargapph, 0, ',', '.') }}</p>
                        <p class="text-center text-white mt-2">Total Potongan dan Yang harus di setor untuk Pajak</p>
                    </div>
                </div>
            </div>
</div>
</div>
<script>
    new DataTable('#example', {
        layout: {
            topStart: {
                buttons: ['excel', 'pdf']
            }
        }
    });
</script>
</x-app-layout>
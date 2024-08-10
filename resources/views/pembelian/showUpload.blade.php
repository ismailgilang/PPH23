<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Upload Pembelian') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
        <div class="flex items-center justify-between mb-4 w-full">
            <h1 class="text-2xl font-bold text-white text-center">Upload Pembelian</h1>
        </div>
        <form action="{{ route('pembelian.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="invoice" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Invoice</label>
                <input type="text" id="invoice" name="invoice" value="{{ $transaksi->invoice }}" readonly
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                @error('invoice')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Nama</label>
                <input type="text" id="name" name="name" value="{{ $transaksi->name }}" required
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="nohp" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">No Handphone</label>
                <input type="text" id="nohp" name="nohp" value="{{ $transaksi->nohp }}" required
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                @error('nohp')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="product" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Product</label>
                <select id="product" name="product" required
                    class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                    <option {{ $transaksi->product == 'Product' ? 'selected' : '' }} value="Product">Product</option>
                    <option {{ $transaksi->product == 'Custom' ? 'selected' : '' }} value="Custom">Custom</option>
                </select>
                @error('product')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="harga" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Harga</label>
                <input type="text" id="harga" name="harga" value="{{ $transaksi->harga }}" required
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm"
                    oninput="calculatePPH()">
                @error('harga')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="hargapph" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">PPH 23</label>
                <input type="text" id="hargapph" name="hargapph" value="{{ $transaksi->hargapph }}" readonly
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                @error('hargapph')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="status" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Status</label>
                <select id="status" name="status" required
                    class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                    <option {{ $transaksi->status == 'Deal' ? 'selected' : '' }} value="Deal">Deal</option>
                    <option {{ $transaksi->status == 'Onprogres' ? 'selected' : '' }} value="Onprogres">Onprogres</option>
                    <option {{ $transaksi->status == 'Done' ? 'selected' : '' }} value="Done">Done</option>
                </select>
                @error('status')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="bukti" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Upload Bukti Pembayaran</label>
                <input type="file" id="bukti" name="bukti" value="{{ $transaksi->bukti }}" readonly
                    class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                @error('bukti')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="setorpph" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Status Bayar PPH</label>
                <select id="setorpph" name="setorpph" required
                    class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                    <option {{ $transaksi->setorpph == 'pending' ? 'selected' : '' }} value="pending">pending</option>
                    <option {{ $transaksi->setorpph == 'done' ? 'selected' : '' }} value="done">done</option>
                </select>
                @error('setorpph')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-4">
                <a href="{{ route('pembelian.index') }}" class="ml-4 text-blue-500 hover:underline">Kembali</a>
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Update</button>
            </div>
        </form>
    </div>
    <script>
        function calculatePPH() {
            const harga = parseFloat(document.getElementById('harga').value) || 0;
            const pph = 0.02; // PPh 23 rate 2%
            const hargapph = harga * pph;
            document.getElementById('hargapph').value = hargapph.toFixed(0);
        }
    </script>
</x-app-layout>

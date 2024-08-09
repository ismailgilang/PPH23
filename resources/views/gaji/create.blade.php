<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Data Gaji') }}
        </h2>
    </x-slot>
    <div class="container mx-auto px-40 py-12">
    <div class="flex items-center justify-between mb-4 w-full">
        <h1 class="text-2xl font-bold text-white text-center">Tambah Gaji</h1>
    </div>
    <form action="{{ route('gaji.store') }}" method="POST" class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
        @csrf

        <div class="mb-4">
            <label for="nama" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Role</label>
            <select id="nama" name="nama" required
                class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                <option selected> -- Pilih Karyawan --</option>
                @foreach($data as $item)
                <option value="{{$item->name}}">{{$item->name}}</option>
                @endforeach
            </select>
            @error('nama')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="mutu_gaji" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Mutu Gaji</label>
            <input type="number" id="mutu_gaji" name="mutu_gaji" value="{{ old('mutu_gaji') }}" step="0.01" required
                class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
            @error('mutu_gaji')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="pph23" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Potongan</label>
            <select id="pph23" name="pph23" required
                class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                <option selected> -- Pilih Potongan --</option>
                <option value="2%">2%</option>
                <option value="4%">4%</option>
                <option value="15%">15%</option>
            </select>
            @error('pph23')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="jabatan" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">Jabatan</label>
            <select id="jabatan" name="jabatan" required
                class="form-select mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
                <option selected > -- Pilih Jabatan --</option>
                <option value="security">Security</option>
                <option value="cleaning">Cleaning</option>
            </select>
            @error('jabatan')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="thp" class="block text-gray-700 dark:text-gray-300 font-bold mb-2">THP</label>
            <input type="number" id="thp" name="thp" value="{{ old('thp') }}" step="0.01" required
                class="form-input mt-1 block w-full rounded-md border-gray-300 shadow-sm dark:bg-gray-700 dark:border-gray-600 dark:text-gray-300 dark:focus:border-blue-500 dark:focus:ring-blue-500 sm:text-sm">
            @error('thp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex items-center justify-end gap-4">
            <a href="{{ route('gaji.index') }}" class="ml-4 text-blue-500 hover:underline">Kembali</a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600">Simpan</button>
        </div>
    </form>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const mutuGajiInput = document.getElementById('mutu_gaji');
            const pph23Select = document.getElementById('pph23');
            const thpInput = document.getElementById('thp');

            function updateTHP() {
                const mutuGaji = parseFloat(mutuGajiInput.value) || 0;
                const pph23 = pph23Select.value;
                const percentage = parseFloat(pph23) / 100;

                const potongan = mutuGaji * percentage;
                const thp = mutuGaji - potongan;

                thpInput.value = thp.toFixed(2);
            }

            mutuGajiInput.addEventListener('input', updateTHP);
            pph23Select.addEventListener('change', updateTHP);

            // Initial update
            updateTHP();
        });
    </script>
</x-app-layout>
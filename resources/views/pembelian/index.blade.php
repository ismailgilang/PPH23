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

    <div class="overflow-x-auto">
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
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Bukti Pembayaran</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Setor PPH</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Dibuat</th>
                <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Upload</th>
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
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">
                    <img src="{{ asset('storage/' . $pembelian->bukti) }}" alt="Foto yang diupload" class="mt-2 max-w-s cursor-pointer" onclick="openModal(this.src)" />
                </td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->setorpph }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $pembelian->created_at }}</td>
                <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">
                    <a href="{{ route('pembelian.show', $pembelian->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-blue-600">Upload</a>
                </td>
                <td class="py-2 px-4 border-b ">
                    <div class="flex space-x-2 justify-center">
                        <a href="{{ route('pembelian.edit', $pembelian->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-yellow-600" >Edit</a>
                        <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-lg shadow-md hover:bg-red-600">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
<!-- Modal -->
<div id="imageModal" class="fixed inset-0 z-50 hidden bg-black bg-opacity-75 flex items-center justify-center">
  <div class="bg-white p-4 rounded-lg max-w-lg w-full">
    <button id="closeModal" class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
      <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
      </svg>
    </button>
    <img id="modalImage" src="" class="w-full h-auto" alt="Gambar" />
  </div>
</div>
<script>
  function openModal(imageSrc) {
    var modal = document.getElementById('imageModal');
    var modalImage = document.getElementById('modalImage');
    modalImage.src = imageSrc;
    modal.classList.remove('hidden');
  }

  document.getElementById('closeModal').addEventListener('click', function () {
    var modal = document.getElementById('imageModal');
    modal.classList.add('hidden');
  });

  // Optionally close the modal if clicked outside of the image
  document.getElementById('imageModal').addEventListener('click', function (event) {
    if (event.target === this) {
      this.classList.add('hidden');
    }
  });
</script>

</x-app-layout>
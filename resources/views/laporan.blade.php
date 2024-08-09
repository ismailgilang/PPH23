<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js" defer></script>
</head>
<body class="relative bg-gray-100 dark:bg-gray-900 overflow-hidden">

    <!-- Background Logo -->
    <div class="bg-logo"></div>

    <!-- Navbar -->
    <nav class="bg-white dark:bg-gray-800 shadow-md fixed w-full top-0 left-0 z-10">
        <div class="container mx-auto px-40 py-4 flex items-center justify-between">
            <div class="flex items-center">
                <a href="{{url('/')}}">
                    <img src="https://via.placeholder.com/150x50" alt="Logo" class="h-10">
                </a>
            </div>
            <div class="flex space-x-6 no-print">
                <a href="{{ route('laporan') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">Laporan</a>
                <a href="{{ route('login') }}" class="text-gray-800 dark:text-gray-200 hover:text-blue-500 dark:hover:text-blue-400">Login</a>
            </div>
        </div>
    </nav>
    
    <div class="container mx-auto px-40 py-12 mt-20">
        <!-- Print Button -->
        
        
        <!-- Printable Content -->
        <div class="printable">
            <h1 class="text-4xl text-center font-bold text-gray-800 dark:text-gray-200 mb-8">Laporan Gaji</h1>
            <div class="flex items-center justify-end gap-4 mb-4 no-print">
                <a href="{{ route('cetak-laporan') }}" class="bg-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:bg-blue-600 no-print">Cetak PDF</a>
            </div>
            <table class="min-w-full bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg shadow-md">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">No</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Nama</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Mutu Gaji</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Potongan</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Jabatan</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Dibuat</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Take Home Pay</th>
                        <th class="py-2 px-4 border-b text-center text-gray-600 dark:text-gray-400">Terpotong</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $i = 1;
                    $totalPotongan = 0;
                    @endphp
                    @foreach ($data as $gaji)
                    <tr>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $i }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->nama }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">Rp {{ number_format($gaji->mutu_gaji, 2) }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->pph23 }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->jabatan }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">{{ $gaji->created_at }}</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">Rp {{ number_format($gaji->thp, 2) }}</td>
                        @php
                            $pph23 = (float) rtrim($gaji->pph23, '%'); // Menghapus '%' dan mengonversi ke float
                            $potongan = $gaji->mutu_gaji * ($pph23 / 100);
                            $totalPotongan += $potongan;
                        @endphp
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center">Rp {{ number_format($potongan, 2) }}</td>
                    </tr>
                    @php
                    $i++;
                    @endphp
                    @endforeach
                    <tr>
                        <td colspan="7" class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-start"><br><br></td>
                    </tr>
                    <tr style="border-top:1px solid white">
                        <td colspan="7" class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-start">Jumlah</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center" style="border-left:1px solid white">
                            Rp {{ number_format($totalPotongan, 2) }}
                        </td>
                    </tr>
                    <tr>
                        <td colspan="7" class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-start">Terbilang</td>
                        <td class="py-2 px-4 border-b text-gray-700 dark:text-gray-300 text-center" style="border-left:1px solid white">
                            {{ $terbilang }} Rupiah
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

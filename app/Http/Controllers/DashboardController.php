<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use NumberToWords\NumberToWords;
use TCPDF;

class DashboardController extends Controller
{
    public function index(){
        $totalKaryawan = User::where('role', 'karyawan')->count();
        return view('dashboard', compact('totalKaryawan'));
    }

    public function laporan(){
        $gajis = Gaji::all();

        // Hitung total potongan
        $totalPotongan = $gajis->reduce(function ($carry, $gaji) {
            $pph23 = (float) rtrim($gaji->pph23, '%'); // Menghapus '%' dan mengonversi ke float
            $potongan = $gaji->mutu_gaji * ($pph23 / 100);
            return $carry + $potongan;
        }, 0);

        // Konversi jumlah potongan ke bentuk terbilang
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('id');
        $terbilang = $numberTransformer->toWords($totalPotongan);

        // Kirim data ke view
        return view('laporan', [
            'data' => $gajis,
            'totalPotongan' => $totalPotongan,
            'terbilang' => $terbilang
        ]);
    }

    public function generateReport()
    {
        // Data untuk laporan
        $gajis = Gaji::all();

        // Hitung total potongan
        $totalPotongan = $gajis->reduce(function ($carry, $gaji) {
            $pph23 = (float) rtrim($gaji->pph23, '%'); // Menghapus '%' dan mengonversi ke float
            $potongan = $gaji->mutu_gaji * ($pph23 / 100);
            return $carry + $potongan;
        }, 0);

        // Konversi jumlah potongan ke bentuk terbilang
        $numberToWords = new NumberToWords();
        $numberTransformer = $numberToWords->getNumberTransformer('id');
        $terbilang = $numberTransformer->toWords($totalPotongan) . ' Rupiah';

        // Buat instance TCPDF
        $pdf = new TCPDF();

        // Set properties
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Laporan Gaji');
        $pdf->SetSubject('Laporan Gaji');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // Menghapus header dan footer default
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        // Tambah halaman
        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        // Tambah konten
        $html = '<div style="text-align: center;">';
        $html .= '<h1>Laporan</h1>';
        $html .= '</div>';

        $html .= '<table border="1" cellpadding="5">';
        $html .= '<thead>';
        $html .= '<tr>';
        $html .= '<th>No</th>';
        $html .= '<th>Nama</th>';
        $html .= '<th>Mutu Gaji</th>';
        $html .= '<th>Potongan</th>';
        $html .= '<th>Jabatan</th>';
        $html .= '<th>Dibuat</th>';
        $html .= '<th>Take Home Pay</th>';
        $html .= '<th>Terpotong</th>';
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';

        $i = 1;
        foreach ($gajis as $gaji) {
            $html .= '<tr>';
            $html .= '<td>' . $i . '</td>';
            $html .= '<td>' . $gaji->nama . '</td>';
            $html .= '<td>Rp ' . number_format($gaji->mutu_gaji, 2) . '</td>';
            $html .= '<td>' . $gaji->pph23 . '</td>';
            $html .= '<td>' . $gaji->jabatan . '</td>';
            $html .= '<td>' . $gaji->created_at . '</td>';
            $html .= '<td>Rp ' . number_format($gaji->thp, 2) . '</td>';

            $pph23 = (float) rtrim($gaji->pph23, '%'); // Menghapus '%' dan mengonversi ke float
            $potongan = $gaji->mutu_gaji * ($pph23 / 100);
            $html .= '<td>Rp ' . number_format($potongan, 2) . '</td>';

            $html .= '</tr>';
            $i++;
        }

        $html .= '<tr>';
        $html .= '<td colspan="7">Jumlah</td>';
        $html .= '<td>Rp ' . number_format($totalPotongan, 2) . '</td>';
        $html .= '</tr>';

        $html .= '<tr>';
        $html .= '<td colspan="7">Terbilang</td>';
        $html .= '<td>' . $terbilang . '</td>';
        $html .= '</tr>';

        $html .= '</tbody>';
        $html .= '</table>';

        $pdf->writeHTML($html, true, false, true, false, '');

        // Output PDF
        $pdf->Output('laporan_gaji.pdf', 'I');
    }
}
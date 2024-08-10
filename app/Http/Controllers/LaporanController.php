<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembelian::all();
        return view('laporan.pajak', compact('data'));
    }

    public function showPajakB()
    {
        $today = Carbon::now();
        // Filter data berdasarkan bulan dan tahun saat ini
        $data = Pembelian::whereYear('created_at', $today->year)
                        ->whereMonth('created_at', $today->month)
                        ->get();
        $totalHargapph = Pembelian::whereYear('created_at', $today->year)
                        ->whereMonth('created_at', $today->month)
                        ->sum('hargapph');

        return view('laporan.pajakBulanan', compact('data', 'totalHargapph'));
    }

    public function showPajakT()
    {
        $today = Carbon::now();
        // Filter data berdasarkan bulan dan tahun saat ini
        $data = Pembelian::whereYear('created_at', $today->year)
                        ->get();
        $totalHargapph = Pembelian::whereYear('created_at', $today->year)
                        ->sum('hargapph');

        return view('laporan.pajakTahunan', compact('data', 'totalHargapph'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembelian;
use Illuminate\Support\Str;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Pembelian::all();
        return view('pembelian.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $latestInvoice = Pembelian::orderBy('created_at', 'desc')->first();
        $invoiceNumber = $this->generateInvoiceNumber($latestInvoice);
        return view('pembelian.create', compact('invoiceNumber'));
    }
    private function generateInvoiceNumber($latestInvoice)
    {
        $prefix = 'INV';
        $date = now()->format('Ymd');
        
        if ($latestInvoice) {
            $lastNumber = intval(substr($latestInvoice->invoice, -4));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }
        
        return $prefix . '-' . $date . '-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = Pembelian::create($request->all());
        return redirect()->route('pembelian.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaksi = Pembelian::findOrFail($id);
        return view('pembelian.showUpload', compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $transaksi = Pembelian::findOrFail($id);
        return view('pembelian.edit', compact('transaksi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $path = $request->file('bukti')->store('photos', 'public');

        // Temukan data Pembelian berdasarkan ID
        $data = Pembelian::findOrFail($id);

        // Perbarui semua data yang di-submit, termasuk path dari file yang diunggah
        $data->update(array_merge($request->all(), ['bukti' => $path]));

        // Redirect ke route pembelian.index setelah update berhasil
        return redirect()->route('pembelian.index')->with('success', 'Data pembelian berhasil diperbarui.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Pembelian::findOrFail($id);
        $data->delete();
        return redirect()->route('pembelian.index');
    }
}

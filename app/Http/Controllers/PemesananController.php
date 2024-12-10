<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function prosesData(Request $request)
    {
        $request->validate([
            'jumlah' => 'required|numeric',
            'harga' => 'required|numeric',
            'catatan' => 'nullable|string',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        Pemesanan::create([
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'catatan' => $request->catatan,
            'metode_pembayaran' => 'cash', // Default
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembalian' => $request->kembalian,
        ]);

        return redirect()->route('payment.index')->with('success', 'Data berhasil disimpan!');
    }
}
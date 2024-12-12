<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ListPesanan;
use App\Models\Pemesanan;
use App\Models\ListPesanann;

class PemesananController extends Controller
{
    public function prosesData(Request $request)
    {
        $request->validate([
            'jumlah' => 'nullable|numeric',
            'catatan' => 'nullable|string',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $pemesanan = Pemesanan::create([
            'jumlah' => $request->jumlah,
            'catatan' => $request->catatan,
            'metode_pembayaran' => 'cash',
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembalian' => $request->kembalian,
        ]);

        $keranjang = session('keranjang', []);

        foreach ($keranjang as $item) {
            ListPesanan::create([
                'pemesanans_id' => $pemesanan->id,
                'produks_id' => $item['id'],
                'jumlah' => $item['quantity'],
                'harga' => $item['harga'],
            ]);
        }

        return redirect()->route('admin.admin')->with('success', 'Data berhasil disimpan!');
    }
}
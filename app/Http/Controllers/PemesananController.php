<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\ListPesanan;
use App\Models\Produk;

class PemesananController extends Controller
{
    public function prosesData(Request $request)
    {
        $request->validate([
            'catatan' => 'nullable|string',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $keranjang = session('keranjang', []);

        $jumlah = 0;
        $harga = 0;

        foreach ($keranjang as $item) {
            $jumlah += $item['quantity'];
            $harga += $item['harga'];
        }

        $pemesanan = Pemesanan::create([
            'jumlah' => $jumlah,
            'harga' => $harga,
            'catatan' => $request->catatan,
            'metode_pembayaran' => 'cash',
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembalian' => $request->kembalian,
        ]);

        foreach ($keranjang as $item) {
            $produk = Produk::find($item['id']);
            $totalHarga = $produk->harga * $item['quantity'];
            ListPesanan::create([
                'pemesanans_id' => $pemesanan->id,
                'produks_id' => $item['id'],
                'qty' => $item['quantity'],
                'total' => $totalHarga,
            ]);
        }

        return redirect()->route('admin.admin')->with('success', 'Data berhasil disimpan!');
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

class PemesananController extends Controller
{
    public function viewData()
    {
        return view('payment.index');
    }

    public function prosesData(Request $request)
    {
        Pemesanan::create([
        'jumlah'          => $request->jumlah,
        'harga'           => $request->harga,
        'catatan'         => $request->catatan,
        'total'           => $request->total,
        'bayar'           => $request->bayar,
        'kembalian'       => $request->kembalian,
        ]);

        return redirect()->route('payment.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
}

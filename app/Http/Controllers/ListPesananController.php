<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListPesanan;

class ListPesananController extends Controller
{
    public function index()
    {
        $listPesanan = ListPesanan::all();
        $groupedPesanan = ListPesanan::with(['pemesanan', 'produk'])
            ->get()
            ->groupBy('pemesanans_id');

        return view('admin.transaksi', compact('groupedPesanan', 'listPesanan'));
    }
}

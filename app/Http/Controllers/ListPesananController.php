<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListPesanan;
use Carbon\Carbon;

class ListPesananController extends Controller
{
    public function index(Request $request)
    {
        $selectedDate = $request->query('date', now()->format('Y-m-d'));

        // Filter pemesanan berdasarkan tanggal
        $groupedPesanan = ListPesanan::with(['pemesanan', 'produk'])
            ->whereDate('created_at', $selectedDate)
            ->get()
            ->groupBy('pemesanans_id');

        $listPesanan = ListPesanan::with('produk')
            ->whereHas('pemesanan', function ($query) use ($selectedDate) {
                $query->whereDate('created_at', $selectedDate);
            })
            ->get();

        return view('admin.transaksi', compact('groupedPesanan', 'listPesanan', 'selectedDate'));
    }
}

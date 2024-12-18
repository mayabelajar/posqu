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

        $paginatedPesananIds = ListPesanan::whereHas('pemesanan', function ($query) use ($selectedDate) {
            $query->whereDate('created_at', $selectedDate);
        })
        ->select('pemesanans_id')
        ->distinct()
        ->paginate(10); 

        $groupedPesanan = ListPesanan::with(['pemesanan', 'produk'])
            ->whereIn('pemesanans_id', $paginatedPesananIds->pluck('pemesanans_id'))  // Ambil data berdasarkan ID Pemesanan yang dipilih
            ->get()
            ->groupBy('pemesanans_id');  

        $totalPesananIds = ListPesanan::whereHas('pemesanan', function ($query) use ($selectedDate) {
            $query->whereDate('created_at', $selectedDate);
        })
        ->select('pemesanans_id')
        ->distinct()
        ->count(); 

        $listPesanan = ListPesanan::with('produk')
            ->whereHas('pemesanan', function ($query) use ($selectedDate) {
                $query->whereDate('created_at', $selectedDate);
            })
            ->get();

        return view('admin.transaksi', compact('groupedPesanan', 'listPesanan', 'selectedDate', 'paginatedPesananIds', 'totalPesananIds'));
    }
}

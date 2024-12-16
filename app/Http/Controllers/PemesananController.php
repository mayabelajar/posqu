<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pemesanan;
use App\Models\ListPesanan;
use App\Models\Produk;

class PemesananController extends Controller
{
    public function prosesData(Request $request)
    {
        // dd($requesut->input()); die;
        $request->validate([
            'catatan' => 'nullable|string',
            'total' => 'required|numeric',
            'bayar' => 'required|numeric',
            'kembalian' => 'required|numeric',
        ]);

        $keranjang = $request->input('keranjang', []); // Ambil data keranjang dari request
        if (empty($keranjang)) {
            return response()->json(['message' => 'Keranjang kosong. Tidak ada data untuk diproses.'], 400);
        }

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

        session()->forget('keranjang');

        return response()->json(['message' => 'Data berhasil disimpan!', 'redirect_url' => route('admin.admin')]);
        // return redirect()->route('admin.admin')->with('success', 'Data berhasil disimpan!');
    }

    public function index()
    {
        $pemesanans = Pemesanan::all();
        $listPesanan = ListPesanan::all();

        return view('admin.transaksi', compact('pemesanans', 'listPesanan'));
    }

    public function harian()
    {
        $pendapatanHarian = Pemesanan::whereDate('created_at', today())->sum('total');

        $menuPalingLaku = ListPesanan::select('produks_id', DB::raw('SUM(qty) as total_qty'))
            ->groupBy('produks_id')
            ->orderByDesc('total_qty')
            ->take(5)
            ->with('produk')
            ->get();

        $allHours = range(0, 23); // Semua jam dari 0 - 23
        $pelangganHarianRaw = Pemesanan::select(DB::raw('EXTRACT(HOUR FROM created_at) as jam'), DB::raw('COUNT(*) as jumlah'))
            ->whereDate('created_at', today())
            ->groupBy(DB::raw('EXTRACT(HOUR FROM created_at)'))
            ->pluck('jumlah', 'jam')
            ->toArray();

        $pelangganHarian = array_map(function ($hour) use ($pelangganHarianRaw) {
            return [
                'jam' => $hour,
                'jumlah' => $pelangganHarianRaw[$hour] ?? 0, // Jika tidak ada data, isi dengan 0
            ];
        }, $allHours);

        return view('laporan.harian', [
            'pendapatanHarian' => $pendapatanHarian,
            'menuPalingLaku' => $menuPalingLaku,
            'pelangganHarian' => $pelangganHarian,
        ]);
    }

    public function bulanan()
    {
        $penghasilanBulanan = Pemesanan::select(DB::raw('EXTRACT(MONTH FROM created_at) as bulan'), DB::raw('SUM(total) as total_penghasilan'))
            ->groupBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
            ->orderBy(DB::raw('EXTRACT(MONTH FROM created_at)'))
            ->pluck('total_penghasilan', 'bulan')
            ->toArray();

        // Isi semua bulan yang tidak ada datanya dengan 0
        $dataPenghasilan = [];
        for ($i = 1; $i <= 12; $i++) {
            $dataPenghasilan[] = $penghasilanBulanan[$i] ?? 0;
        }

        return view('laporan.bulanan', ['dataPenghasilan' => $dataPenghasilan]);
    }

    public function tahunan()
    {
        $annualIncomeData = Pemesanan::select(DB::raw('EXTRACT(YEAR FROM created_at) as year'), DB::raw('SUM(total) as total_income'))
        ->groupBy(DB::raw('EXTRACT(YEAR FROM created_at)'))
        ->orderBy(DB::raw('EXTRACT(YEAR FROM created_at)'))
        ->pluck('total_income', 'year')
        ->toArray();

        $years = range(2023, 2024);

        $annualIncome = [];
        foreach ($years as $year) {
            $annualIncome[] = $annualIncomeData[$year] ?? 0;
        }

        return view('laporan.tahunan', [
            'years' => $years,
            'annualIncome' => $annualIncome
        ]);
    }
}
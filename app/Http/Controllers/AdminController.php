<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;
use App\Models\ListPesanan;
use App\Models\Pemesanan;

class AdminController extends Controller
{
    public function index()
    {
        if ($request->ajax()) {
            return response()->json([
                'status' => 'success',
                'data' => $produks
            ]);
        }

        return view('admin.produks.index', compact('produks'));
    }

    public function admin(Request $request) {
        $query = $request->input('query');
        $kategori = $request->input('kategori');

        // Membangun query dasar
        $produks = Produk::query();

        // Filter berdasarkan kategori jika ada
        if ($kategori) {
            $produks->where('kategori', $kategori);
        }

        // Filter berdasarkan query pencarian jika ada
        if ($query) {
            $produks->where(function($queryBuilder) use ($query) {
                $queryBuilder->where('title', 'like', "%{$query}%")
                            ->orWhere('content', 'like', "%{$query}%");
            });
        }

        // Ambil semua produk yang sudah difilter
        $produks = $produks->get();

        // Jika permintaan AJAX, kembalikan hasil pencarian
        if ($request->ajax()) {
            return view('admin.partials.results', compact('produks'));
        }

        // Ambil data lain yang diperlukan untuk tampilan
        $list_pesanans = ListPesanan::all();

        // Kembalikan tampilan utama
        return view('admin.template', compact('produks', 'kategori', 'list_pesanans', 'query'));
    }
    
    public function transaksi() {
        $pemesanans = Pemesanan::all();
        $listPesanan = ListPesanan::all();
        return view('admin.transaksi', compact('pemesanans', 'listPesanan'));
    }
    public function meja() {
        return view('admin.meja');
    }

    public function destroy($id)
    {
        //delete post by ID
        Produk::where('id', $id)->delete();

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Dihapus!.',
        ]); 
    }

    public function set_session_category(Request $request)
    {
        // dd($request->all()); die;

        try {
            $dataKeranjang = json_decode($request->getContent(), true);
            session(['keranjang' => $dataKeranjang['data']]);

            return response()->json(['message' => 'Data berhasil disimpan ke session!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menyimpan data.', 'error' => $e->getMessage()], 500);
        }
    }

    public function searchProduk(Request $request)
    {
        $keyword = $request->get('query'); // Ambil kata kunci dari request

        // Ambil data dari model Produk
        $produks = Produk::where('nama', 'LIKE', "%{$keyword}%") // Filter nama produk
                          ->orWhere('deskripsi', 'LIKE', "%{$keyword}%") // Filter deskripsi
                          ->get();

        // Kembalikan data sebagai JSON
        return response()->json($produks);
    }

    public function getProdukByKategori(Request $request)
    {
        $kategori = $request->input('kategori');
    
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 400);
        }
    
        try {
            // Ambil data dari API
            $response = Http::get(route('produks.index'), ['kategori' => $kategori]);
    
            if ($response->successful()) {
                return response()->json($response->json());
            }
    
            return response()->json(['error' => 'Gagal mengambil data dari API'], $response->status());
        } catch (\Exception $e) {
            \Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan internal'], 500);
        }
    }
}
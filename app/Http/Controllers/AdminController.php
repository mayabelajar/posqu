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

        $counts = Produk::select('kategori', \DB::raw('COUNT(*) as count'))
            ->groupBy('kategori')
            ->pluck('count', 'kategori');

        $produks = Produk::query();

        if ($kategori) {
            $produks->where('kategori', $kategori);
        }

        if ($query) {
            $produks->where(function($queryBuilder) use ($query) {
                $queryBuilder->whereRaw('LOWER(nama) LIKE ?', ['%' . strtolower($query) . '%']);
            });
        }

        $produks = $produks->get();

        if ($request->ajax()) {
            return view('admin.partials.results', compact('produks'));
        }

        $list_pesanans = ListPesanan::all();

        return view('admin.template', compact('produks', 'kategori', 'list_pesanans', 'query', 'counts'));
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
    

    public function getProdukByKategori(Request $request)
    {
        $kategori = $request->input('kategori');
    
        if (!$kategori) {
            return response()->json(['error' => 'Kategori tidak ditemukan'], 400);
        }
    
        try {
            $produks = Produk::where('kategori', $kategori)->get();

            $html = view('admin.partials.produk-list', compact('produks'))->render();

            return response()->json([
                'status' => 'success',
                'data' => $html
            ]);
        } catch (\Exception $e) {
            \Log::error('Error: ' . $e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan internal'], 500);
        }

    }
}
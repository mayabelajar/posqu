<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Produk;
use App\Models\ListPesanan;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
        // $produks = Produk::all();
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
        return view('admin.transaksi');
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

}
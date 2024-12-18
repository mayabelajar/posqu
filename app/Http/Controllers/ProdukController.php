<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) : view
   {
        $kategori = $request->input('kategori');

        if ($kategori) {
            $produks = Produk::where('kategori', $kategori)->get();
        } else {
            $produks = Produk::all();
        }

        return view('produk.index', compact('produks', 'kategori'));
        
   }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : view
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'image'         => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama'          => 'required',
            'kategori'      => 'required',
            'harga'         => 'required'
        ]);

 
        $image = $request->file('image');
        $image->storeAs('public/produks', $image->hashName());

        Produk::create([
            'image'         => $image->hashName(),
            'nama'          => $request->nama,
            'kategori'      => $request->kategori,
            'harga'         => $request->harga
        ]);

        return redirect()->route('produks.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): view
    {
        $produks = Produk::findOrFail($id);

        return view('produk.edit', compact('produks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $produks = Produk::findOrFail($id);

        if ($request->hasFile('image')) {

            $image = $request->file('image');
            $image->storeAs('public/produks', $image->hashName());

            Storage::delete('public/produks/'.$produks->image);

            $produks->update([
                'image'         => $image->hashName(),
                'nama'          => $request->nama,
                'kategori'      => $request->kategori,
                'harga'         => $request->harga
            ]);

        } else {

            $produks->update([
                'nama'          => $request->nama,
                'kategori'      => $request->kategori,
                'harga'         => $request->harga
            ]);
        }

        return redirect()->route('produks.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $produks = Produk::findOrFail($id);

        Storage::delete('public/produks/'. $produks->image);

        $produks->delete();

        return redirect()->route('produks.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        $produks = Produk::where('nama', 'LIKE', '%' . $query . '%')->get();
    
        // Menambahkan path gambar penuh
        foreach ($produks as $produk) {
            $produk->image = asset('storage/produks/' . $produk->image);  // Menggunakan asset URL lengkap
        }
    
        return response()->json($produks);  // Mengembalikan data dalam format JSON
    }
    
}

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
    public function index() : view
   {
        $produks = Produk::latest()->paginate(10);

        return view('produk.index', compact('produks'));
        
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
            'stok'          => 'required',
            'harga'         => 'required',
            'deskripsi'     => 'required'
        ]);

 
        $image = $request->file('image');
        $image->storeAs('public/produks', $image->hashName());

        Produk::create([
            'image'         => $image->hashName(),
            'nama'          => $request->nama,
            'kategori'      => $request->kategori,
            'stok'          => $request->stok,
            'harga'         => $request->harga,
            'deskripsi'     => $request->deskripsi
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
                'stok'          => $request->stok,
                'harga'         => $request->harga,
                'deskripsi'     => $request->deskripsi
            ]);

        } else {

            $produks->update([
                'nama'          => $request->nama,
                'kategori'      => $request->kategori,
                'stok'          => $request->stok,
                'harga'         => $request->harga,
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
}

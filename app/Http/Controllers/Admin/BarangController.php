<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades;
use App\Http\Requests\Admin\BarangStoreRequest;
use App\Http\Requests\Admin\BarangUpdateRequest;
use Illuminate\Support\Str;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::latest()->get();
        return view('admin.barangs.index', compact('barangs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.barangs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangStoreRequest $request)
    {
        if($request->validated()){
            $gambar = $request->file('gambar')->store('assets/barang', 'public');
            $slug = Str::slug($request->nama, '-');
            Barang::create($request->except('gambar') + ['gambar'=> $gambar, 'slug' => $slug]);
        }

        return redirect() -> route('admin.barang.index')->with([
            'message'=> 'data sukses dibuat',
            'alert-type' => 'success'
        ]);
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
    public function edit(Barang $barang)
    {
        return view ('admin.barangs.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BarangUpdateRequest $request, Barang $barang)
    {
        if($request->validated()){
            $slug = Str::slug($request->nama, '-');
            $barang->update($request->validated() + ['slug' => $slug]);
        }

        return redirect()->route('admin.barang.index')->with([
            'message'=> 'data berhasil diedit',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        if($barang->gambar){
            unlink('storage/'. $barang->gambar);
        }
        $barang->delete();

        return redirect()->back()->with([
            'message' => 'data berhasil dihapus',
            'alert type' => 'info'
        ]);
    }

    public function updateImage(Request $request, $barangId)
    {
        $request->validate([
            'gambar' => 'required|image'
        ]);
        $barang = Barang::findOrFail($barangId);
        if($request->gambar){
            unlink('storage/'. $barang->gambar);
            $gambar = $request->file('gambar')->store('assets/barang','public');
            
            $barang->update(['gambar' => $gambar]);
        }

        return redirect()->back()->with([
            'message' => 'gambar berhasil diedit',
            'alert-type' => 'info'
        ]);
    }
}

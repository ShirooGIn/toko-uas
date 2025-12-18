<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index() {
        $produks = Produk::all();
        return view('produk.index', compact('produks'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        Produk::create($request->all());
        return redirect()->back()->with('success', 'Barang berhasil ditambah!');
    }

    public function edit(Produk $produk) {
        return view('produk.edit', compact('produk'));
    }

    public function update(Request $request, Produk $produk) {
        $request->validate([
            'nama_barang' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
        ]);
        $produk->update($request->all());
        return redirect()->route('produk.index')->with('success', 'Barang berhasil diupdate!');
    }

    public function destroy(Produk $produk) {
        $produk->delete();
        return redirect()->back()->with('success', 'Barang berhasil dihapus!');
    }
}
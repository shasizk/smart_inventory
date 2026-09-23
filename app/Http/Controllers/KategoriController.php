<?php

namespace App\Http\Controllers;

use App\Models\KategoriBarang;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategoris = KategoriBarang::latest()->get();

        return view('kategori.index', [
            'title' => 'Kategori Barang',
            'kategoris' => $kategoris,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);

        $lastKode = KategoriBarang::max('kategori_id');

        $lastNumber = $lastKode ? (int) preg_replace('/\D+/', '', $lastKode) : 0;

        $kode = 'KAT-' . str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);


        KategoriBarang::create([
            'kategori_id' => $kode,
            'nama_kategori' => $request->nama_kategori,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Kategori barang berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'catatan' => 'nullable|string',
        ]);
  

        $kategori = KategoriBarang::findOrFail($id);
        $kategori->update([
            'nama_kategori' => $request->nama_kategori,
            'catatan' => $request->catatan,
        ]);

        return redirect()->back()->with('success', 'Kategori barang berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $kategori = KategoriBarang::findOrFail($id);
        $kategori->delete();

        return redirect()->back()->with('success', 'Kategori barang berhasil dihapus!');
    }
}
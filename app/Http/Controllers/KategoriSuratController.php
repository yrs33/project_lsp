<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriSurat;

class KategoriSuratController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $kategori = KategoriSurat::when($search, function($q) use ($search) {
            $q->where('nama_kategori', 'like', "%$search%")
              ->orWhere('keterangan', 'like', "%$search%")
              ->orWhere('id', $search);
        })->get();
        return view('kategori.index', compact('kategori', 'search'));
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        KategoriSurat::create($request->only('nama_kategori', 'keterangan'));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        $kategori = KategoriSurat::findOrFail($id);
        $kategori->update($request->only('nama_kategori', 'keterangan'));
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diupdate!');
    }

    public function destroy($id)
    {
        $kategori = KategoriSurat::findOrFail($id);
        $kategori->delete();
        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArsipSurat;
use App\Models\KategoriSurat;

class ArsipSuratController extends Controller
{
    public function edit($id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $kategori = KategoriSurat::all();
        return view('arsip.edit', compact('arsip', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $arsip = ArsipSurat::findOrFail($id);
        $request->validate([
            'nomor_surat' => 'required',
            'kategori_id' => 'required|exists:kategori_surats,id',
            'judul' => 'required',
            'tanggal_surat' => 'required|date',
            'file_pdf' => 'nullable|mimes:pdf|max:2048',
        ]);
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;
        $arsip->tanggal_surat = $request->tanggal_surat;
        if ($request->hasFile('file_pdf')) {
            // Hapus file lama
            if ($arsip->file_pdf && \Storage::disk('public')->exists('arsip/'.$arsip->file_pdf)) {
                \Storage::disk('public')->delete('arsip/'.$arsip->file_pdf);
            }
            $file = $request->file('file_pdf');
            $fileName = time().'_'.$file->getClientOriginalName();
            $file->storeAs('arsip', $fileName, 'public');
            $arsip->file_pdf = $fileName;
        }
        $arsip->save();
        return redirect()->route('arsip.index')->with('success', 'Data berhasil diupdate');
    }
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = ArsipSurat::with('kategori');
        if ($search) {
            $query->where('judul', 'like', "%$search%");
        }
        $arsip = $query->orderBy('created_at', 'desc')->get();
        return view('arsip.index', compact('arsip', 'search'));
    }

    public function create()
    {
        $kategori = \App\Models\KategoriSurat::all();
        return view('arsip.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nomor_surat' => 'required',
            'kategori_id' => 'required|exists:kategori_surats,id',
            'judul' => 'required',
            'tanggal_surat' => 'required|date',
            'file_pdf' => 'required|mimes:pdf|max:2048',
        ]);
        $file = $request->file('file_pdf');
        $fileName = time().'_'.$file->getClientOriginalName();
        $file->storeAs('arsip', $fileName, 'public');
        $arsip = new \App\Models\ArsipSurat();
        $arsip->nomor_surat = $request->nomor_surat;
        $arsip->kategori_id = $request->kategori_id;
        $arsip->judul = $request->judul;
        $arsip->tanggal_surat = $request->tanggal_surat;
        $arsip->file_pdf = $fileName;
        $arsip->save();
        return redirect()->route('arsip.index')->with('success', 'Data berhasil disimpan');
    }

    public function show($id)
    {
        $arsip = \App\Models\ArsipSurat::with('kategori')->findOrFail($id);
        return view('arsip.show', compact('arsip'));
    }

    public function destroy($id)
    {
        $arsip = \App\Models\ArsipSurat::findOrFail($id);
        // Hapus file PDF jika ada
        if ($arsip->file_pdf && \Storage::disk('public')->exists('arsip/'.$arsip->file_pdf)) {
            \Storage::disk('public')->delete('arsip/'.$arsip->file_pdf);
        }
        $arsip->delete();
        return redirect()->route('arsip.index')->with('success', 'Data berhasil dihapus');
    }
}

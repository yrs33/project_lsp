@extends('layouts.app')

@section('content')
<style>
    body { background: #f7f8fa; }
    .sidebar {
        min-height: 100vh;
        border-right: 2px solid #e0e0e0;
        background: #f4f6fb;
    }
    .sidebar h5 { font-weight: bold; letter-spacing: 1px; }
    .sidebar .nav-link { color: #222; font-weight: 500; border-radius: 8px; margin-bottom: 4px; }
    .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #222; color: #fff; }
    .mt-4 { margin-top: 2rem!important; }
    .sidebar ul { margin-top: 2rem; }
    .btn { border-radius: 8px; font-weight: 500; }
    .btn-warning { background: #f1c40f; border: none; color: #222; }
    .btn-secondary { background: #888; border: none; }
    .btn-info { background: #2980b9; border: none; color: #fff; }
    .mb-3 { background: #fff; border-radius: 12px; padding: 1.2rem 1.5rem; box-shadow: 0 2px 8px #0001; }
    iframe { border-radius: 12px; border: 1px solid #e0e0e0; background: #222; }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <h5 class="mt-4">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('arsip.index') }}">Arsip</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}">Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-4">Arsip Surat &gt;&gt; Lihat</h2>
            <div class="mb-3">
                <b>Nomor:</b> {{ $arsip->nomor_surat }}<br>
                <b>Kategori:</b> {{ $arsip->kategori->nama_kategori ?? '-' }}<br>
                <b>Judul:</b> {{ $arsip->judul }}<br>
                <b>Waktu Unggah:</b> {{ $arsip->created_at }}
            </div>
            <div class="mb-3">
                <iframe src="{{ asset('storage/arsip/'.$arsip->file_pdf) }}" width="100%" height="400px"></iframe>
            </div>
            <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
            <a href="{{ asset('storage/arsip/'.$arsip->file_pdf) }}" class="btn btn-warning" download>Unduh</a>
            <a href="{{ route('arsip.create') }}?edit={{ $arsip->id }}" class="btn btn-info">Edit/Ganti File</a>
        </div>
    </div>
</div>
@endsection

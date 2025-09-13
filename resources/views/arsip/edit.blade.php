@extends('layouts.app')

@section('content')
<style>
    @media (max-width: 768px) {
        .sidebar { min-height: auto; border-right: none; border-bottom: 2px solid #e0e0e0; }
        .sidebar ul { margin-top: 0.5rem; }
        .col-md-2.sidebar { width: 100%!important; max-width: 100%!important; }
        .col-md-10 { width: 100%!important; max-width: 100%!important; }
        .container-fluid, .container { padding: 1rem!important; }
        h2, .mt-4 { margin-top: 1rem!important; }
    }
    body { background: #f7f8fa; }
    .sidebar {
        min-height: 100vh;
        border-right: 2px solid #e0e0e0;
        background: #f4f6fb;
    }
    .sidebar h5 { font-weight: bold; letter-spacing: 1px; }
    .sidebar .nav-link { color: #222; font-weight: 500; border-radius: 8px; margin-bottom: 4px; }
    .sidebar .nav-link.active, .sidebar .nav-link:hover { background: #222; color: #fff; }
    .container-fluid { background: #fff; border-radius: 14px; box-shadow: 0 2px 8px #0001; padding: 2.5rem 2.5rem 2rem 2.5rem; }
    h2 { font-weight: bold; }
    .form-label, label { font-weight: 500; }
    .form-control:focus, textarea:focus { box-shadow: 0 0 0 2px #2222; border-color: #222; }
    .btn { border-radius: 8px; font-weight: 500; }
    .btn-primary { background: #2980b9; border: none; }
    .btn-secondary { background: #888; border: none; }
    .mb-3 { margin-bottom: 1.2rem!important; }
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
            <h2 class="mt-4">Arsip Surat &gt;&gt; Edit</h2>
            <p>Edit data surat yang telah diarsipkan. <b>Catatan:</b> File PDF baru akan menggantikan file lama jika diunggah.</p>
            <form method="POST" action="{{ route('arsip.update', $arsip->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" value="{{ $arsip->nomor_surat }}" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}" {{ $arsip->kategori_id == $k->id ? 'selected' : '' }}>{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" value="{{ $arsip->judul }}" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control" value="{{ $arsip->tanggal_surat ? date('Y-m-d', strtotime($arsip->tanggal_surat)) : '' }}" required>
                </div>
                <div class="mb-3">
                    <label>File Surat (PDF)</label>
                    <input type="file" name="file_pdf" class="form-control" accept="application/pdf">
                    <small class="text-muted">Kosongkan jika tidak ingin mengganti file.</small>
                </div>
                <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection

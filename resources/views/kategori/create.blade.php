@extends('layouts.app')

@section('content')
<style>
    body { background: #f7f8fa; }
    .container { background: #fff; border-radius: 14px; box-shadow: 0 2px 8px #0001; padding: 2.5rem 2.5rem 2rem 2.5rem; }
    h3 { font-weight: bold; }
    .form-label, label { font-weight: 500; }
    .form-control:focus, textarea:focus { box-shadow: 0 0 0 2px #2222; border-color: #222; }
    .btn { border-radius: 8px; font-weight: 500; }
    .btn-dark { background: #222; border: none; }
    .btn-outline-dark { border-radius: 8px; }
    textarea.form-control { min-height: 90px; }
</style>
<div class="container mt-4">
    <h3>Kategori Surat &gt;&gt; Tambah</h3>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
    <form action="{{ route('kategori.store') }}" method="POST">
        @csrf
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ID (Auto Increment)</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" value="(otomatis)" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Judul</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10">
                <a href="{{ route('kategori.index') }}" class="btn btn-outline-dark">&lt;&lt; Kembali</a>
                <button type="submit" class="btn btn-dark ms-2">Simpan</button>
            </div>
        </div>
    </form>
</div>
@endsection

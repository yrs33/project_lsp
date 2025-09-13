@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3>Kategori Surat &gt;&gt; Edit</h3>
    <p>Tambahkan atau edit data kategori. Jika sudah selesai, jangan lupa untuk mengklik tombol "Simpan"</p>
    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">ID (Auto Increment)</label>
            <div class="col-sm-2">
                <input type="text" class="form-control" value="{{ $kategori->id }}" readonly>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{ $kategori->nama_kategori }}" required>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
            <div class="col-sm-8">
                <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ $kategori->keterangan }}</textarea>
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

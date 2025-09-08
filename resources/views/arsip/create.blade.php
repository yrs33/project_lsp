@extends('layouts.app')

@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <h5 class="mt-4">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('arsip.index') }}">Arsip</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-4">Arsip Surat &gt;&gt; Unggah</h2>
            <p>Unggah surat yang telah terbit pada form ini untuk diarsipkan.<br><b>Catatan:</b> Gunakan file berformat PDF</p>
            <form method="POST" action="{{ route('arsip.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label>Nomor Surat</label>
                    <input type="text" name="nomor_surat" class="form-control" placeholder="Masukkan nomor surat" required>
                </div>
                <div class="mb-3">
                    <label>Kategori</label>
                    <select name="kategori_id" class="form-control" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->nama_kategori }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text" name="judul" class="form-control" placeholder="Masukkan judul surat" required>
                </div>
                <div class="mb-3">
                    <label>Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label>File Surat (PDF)</label>
                    <input type="file" name="file_pdf" class="form-control" accept="application/pdf" required>
                </div>
                <a href="{{ route('arsip.index') }}" class="btn btn-secondary">&lt;&lt; Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>
@endsection

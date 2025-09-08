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

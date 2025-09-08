@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <h5 class="mt-4">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('arsip.index') }}"> Arsip</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('kategori.index') }}">Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">About</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-4">About</h2>
            <div class="d-flex align-items-start mt-4">
                <img src="{{ asset('storage/foto-profil.jpg') }}" alt="Foto Profil" style="width:120px;height:120px;border-radius:18px;border:4px solid #000;object-fit:cover;">
                <div class="ms-4" style="font-size:18px;">
                    <b>Aplikasi ini dibuat oleh:</b><br>
                    Nama &nbsp;&nbsp;&nbsp;&nbsp;: Yuris Aprilian Wicaksono<br>
                    Prodi &nbsp;&nbsp;&nbsp;&nbsp;: D3-MI PSDKU Kediri<br>
                    NIM &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 2331730086<br>
                    Tanggal : 7 September 2025
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

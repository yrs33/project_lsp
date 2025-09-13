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
    .container-fluid { background: #fff; border-radius: 14px; box-shadow: 0 2px 8px #0001; padding: 2.5rem 2.5rem 2rem 2.5rem; }
    h2 { font-weight: bold; }
    .about-box { background: #f7f8fa; border-radius: 16px; padding: 2rem 2.5rem; display: flex; align-items: flex-start; }
    .about-box img { width: 120px; height: 120px; border-radius: 18px; border: 4px solid #000; object-fit: cover; background: #eee; }
    .about-info { font-size: 18px; margin-left: 2rem; margin-top: 0.5rem; }
</style>
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
            <div class="about-box mt-4">
                <img src="{{ asset('storage/foto-profil.jpg') }}" alt="Foto Profil">
                <div class="about-info">
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

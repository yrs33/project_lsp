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
    .table-bordered th, .table-bordered td { vertical-align: middle; }
    .table thead th { background: #222; color: #fff; border-color: #222; }
    .btn-outline-dark, .btn-success { border-radius: 8px; }
    .btn { border-radius: 8px; font-weight: 500; }
    .btn-danger { background: #e74c3c; border: none; }
    .btn-primary { background: #2980b9; border: none; }
    .btn-dark { background: #222; border: none; }
    .btn-success { background: #27ae60; border: none; }
    .modal-content { border-radius: 18px; }
    .form-control:focus { box-shadow: 0 0 0 2px #2222; border-color: #222; }
    .table-bordered { background: #fff; }
    .mt-4 { margin-top: 2rem!important; }
    .sidebar ul { margin-top: 2rem; }
    .btn-sm { padding: 0.25rem 0.7rem; font-size: 0.98em; }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <h5 class="mt-4">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="{{ route('arsip.index') }}"> Arsip</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('kategori.index') }}">Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-4">Kategori Surat</h2>
            <p>Berikut ini adalah kategori yang bisa digunakan untuk melabeli surat.<br>Klik "Tambah" pada kolom aksi untuk menambahkan kategori baru.</p>
            <form method="GET" action="" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control w-25" placeholder="search" value="{{ $search }}">
                <button type="submit" class="btn btn-dark ms-2">Cari!</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID Kategori</th>
                        <th>Nama Kategori</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($kategori as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->nama_kategori }}</td>
                        <td>{{ $item->keterangan }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">Hapus</button>
                            </form>
                            <a href="{{ route('kategori.edit', $item->id) }}" class="btn btn-primary btn-sm ms-1">Edit</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="4" class="text-center">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('kategori.create') }}" class="btn btn-success mt-2">[ + ] Tambah Kategori Baru...</a>
        </div>
    </div>
</div>

<!-- Modal Konfirmasi Hapus (reuse dari arsip) -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="border-radius:18px;">
      <div class="modal-body text-center p-4">
        <div class="mb-3" style="font-weight:600;font-size:20px;">Alert</div>
        <div class="mb-4">Apakah Anda yakin ingin menghapus kategori ini?</div>
        <div class="row">
          <div class="col-6 pe-1">
            <button type="button" class="btn btn-light w-100" data-bs-dismiss="modal" style="border:1px solid #888;">Batal</button>
          </div>
          <div class="col-6 ps-1">
            <button type="button" class="btn btn-dark w-100" id="confirmDeleteBtn">Ya!</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<script>
    let formToDelete = null;
    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            e.preventDefault();
            formToDelete = this.closest('form');
            var modal = new bootstrap.Modal(document.getElementById('deleteModal'));
            modal.show();
        });
    });
    document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
        if(formToDelete) formToDelete.submit();
    });
</script>
@endpush

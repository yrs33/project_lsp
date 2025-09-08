@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 bg-light sidebar">
            <h5 class="mt-4">Menu</h5>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link active" href="{{ route('arsip.index') }}"> Arsip</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('kategori.index') }}">Kategori Surat</a></li>
                <li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">About</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <h2 class="mt-4">Arsip Surat</h2>
            <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan.<br>Klik "Lihat" pada kolom aksi untuk menampilkan surat.</p>
            <form method="GET" action="" class="mb-3 d-flex">
                <input type="text" name="search" class="form-control w-25" placeholder="cari judul surat" value="{{ $search }}">
                <button type="submit" class="btn btn-dark ms-2">Cari!</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nomor Surat</th>
                        <th>Kategori</th>
                        <th>Judul</th>
                        <th>Waktu Pengarsipan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($arsip as $item)
                    <tr>
                        <td>{{ $item->nomor_surat }}</td>
                        <td>{{ $item->kategori->nama_kategori ?? '-' }}</td>
                        <td>{{ $item->judul }}</td>
                        <td>{{ $item->created_at }}</td>
                        <td>
                            <form action="{{ route('arsip.destroy', $item->id) }}" method="POST" class="d-inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="{{ $item->id }}">Hapus</button>
                            </form>
<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius:18px;">
            <div class="modal-body text-center p-4">
                <div class="mb-3" style="font-weight:600;font-size:20px;">Alert</div>
                <div class="mb-4">Apakah Anda yakin ingin menghapus arsip surat ini?</div>
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
                            <a href="{{ asset('storage/arsip/'.$item->file_pdf) }}" class="btn btn-warning btn-sm" download>Unduh</a>
                            <a href="{{ route('arsip.show', $item->id) }}" class="btn btn-primary btn-sm">Lihat &gt;&gt;</a>
                        </td>
                    </tr>
                    @empty
                    <tr><td colspan="5" class="text-center">Tidak ada data</td></tr>
                    @endforelse
                </tbody>
            </table>
            <a href="{{ route('arsip.create') }}" class="btn btn-outline-dark mt-2">Arsipkan Surat..</a>
        </div>
    </div>
</div>
@endsection

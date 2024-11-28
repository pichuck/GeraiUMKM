@extends('layouts.admin.app')

@section('title', 'Tinjau UMKM')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Tinjau Data UMKM</h4>
                    <form action="{{ route('superadmin.umkm.verify', $umkm->id) }}" method="POST" class="ml-auto">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-check"></i> Verifikasi dan Ubah Status Menjadi Active
                        </button>
                    </form>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- Foto Profil -->
                        <div class="col-md-4 text-center">
                            <img src="{{ asset('storage/umkm/foto_profil/' . $umkm->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded-circle mb-3" style="width: 150px; height: 150px;">
                            <h5 class="mb-3">{{ $umkm->nama_umkm }}</h5>
                        </div>

                        {{-- <!-- Foto Sampul -->
                        <div class="col-md-8">
                            <div class="card mb-3">
                                <img src="{{ asset('storage/umkm/foto_sampul/' . $umkm->foto_sampul) }}" alt="Foto Sampul" class="img-fluid rounded">
                            </div>
                        </div> --}}
                    </div>

                    <div class="row mt-4">
                        <div class="col-md-6">
                            <h5>Informasi UMKM</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Deskripsi:</strong> {{ $umkm->deskripsi }}</li>
                                <li class="list-group-item"><strong>Kategori:</strong> {{ $umkm->kategori }}</li>
                                <li class="list-group-item"><strong>Provinsi:</strong> {{ $umkm->provinsi }}</li>
                                <li class="list-group-item"><strong>Kota:</strong> {{ $umkm->kota }}</li>
                                <li class="list-group-item"><strong>Kecamatan:</strong> {{ $umkm->kecamatan }}</li>
                                <li class="list-group-item"><strong>Kode Pos:</strong> {{ $umkm->kode_pos }}</li>
                                <li class="list-group-item"><strong>Alamat:</strong> {{ $umkm->alamat }}</li>
                            </ul>
                        </div>

                        <div class="col-md-6">
                            <h5>Informasi Tambahan</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Informasi Pemilik:</strong> {{ $umkm->informasi_pemilik }}</li>
                                <li class="list-group-item"><strong>Informasi Bisnis:</strong> {{ $umkm->informasi_bisnis }}</li>
                                <li class="list-group-item"><strong>Status Verifikasi:</strong> {{ $umkm->status === 'true' ? 'Terverifikasi' : 'Belum Terverifikasi' }}</li>
                                <li class="list-group-item"><strong>Dibuat pada:</strong> {{ $umkm->created_at ? $umkm->created_at->format('d M Y') : 'Tidak tersedia' }}</li>
                                <li class="list-group-item"><strong>Diperbarui pada:</strong> {{ $umkm->updated_at ? $umkm->updated_at->format('d M Y') : 'Tidak tersedia' }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

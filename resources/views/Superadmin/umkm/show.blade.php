@extends('layouts.admin.app')

@section('title', 'Detail UMKM')

@section('content')
    <section class="section">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">Detail UMKM: {{ $umkm->nama_umkm }}</h4>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}
" alt="Foto Profil"
                                    class="img-fluid rounded-circle mb-3" style="max-width: 200px; height: auto;">
                                <h5 class="font-weight-bold">{{ $umkm->nama_umkm }}</h5>
                                <p class="text-muted">{{ $umkm->kategori }}</p>
                            </div>
                            <div class="col-md-8">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <th class="bg-light" width="30%">ID UMKM</th>
                                                <td>{{ $umkm->id }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">User ID</th>
                                                <td>{{ $umkm->user_id }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Nama UMKM</th>
                                                <td>{{ $umkm->nama_umkm }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Deskripsi</th>
                                                <td>{{ $umkm->deskripsi }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Kategori</th>
                                                <td>{{ $umkm->kategori }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Provinsi</th>
                                                <td>{{ $umkm->provinsi }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Kota</th>
                                                <td>{{ $umkm->kota }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Kecamatan</th>
                                                <td>{{ $umkm->kecamatan }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Kode Pos</th>
                                                <td>{{ $umkm->kode_pos }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Alamat</th>
                                                <td>{{ $umkm->alamat }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Informasi Pemilik</th>
                                                <td>{{ $umkm->informasi_pemilik }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Informasi Bisnis</th>
                                                <td>{{ $umkm->informasi_bisnis }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Dibuat pada</th>
                                                <td>{{ $umkm->created_at }}</td>
                                            </tr>
                                            <tr>
                                                <th class="bg-light">Diperbarui pada</th>
                                                <td>{{ $umkm->updated_at }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <a href="{{ route('superadmin.umkm') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                                </a>
                                <a href="{{ route('superadmin.umkm.edit', $umkm->id) }}" class="btn btn-primary ml-2">
                                    <i class="fas fa-edit mr-2"></i> Edit UMKM
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('styles')
    <style>
        .table th,
        .table td {
            vertical-align: middle;
        }

        .bg-light {
            background-color: #f8f9fa;
        }
    </style>
@endpush

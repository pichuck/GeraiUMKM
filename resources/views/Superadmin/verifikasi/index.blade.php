@extends('layouts.admin.app')

@section('title', 'Dashboard')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Data UMKM</h4>
                    {{-- Tombol tambah dihapus sesuai permintaan --}}
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                    <table id="umkmTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama UMKM</th>
                                <th>Deskripsi</th>
                                <th>Kategori</th>
                                <th>Provinsi</th>
                                <th>Kota</th>
                                <th>Kecamatan</th>
                                <th>Kode Pos</th>
                                <th>Alamat</th>
                                <th>Verifikasi</th> <!-- Ganti dari Aksi menjadi Verifikasi -->
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($umkm as $umkm)
                            <tr>
                                <td>{{ $umkm->id }}</td>
                                <td>{{ $umkm->nama_umkm }}</td>
                                <td>{{ $umkm->deskripsi }}</td>
                                <td>{{ $umkm->kategori }}</td>
                                <td>{{ $umkm->provinsi }}</td>
                                <td>{{ $umkm->kota }}</td>
                                <td>{{ $umkm->kecamatan }}</td>
                                <td>{{ $umkm->kode_pos }}</td>
                                <td>{{ $umkm->alamat }}</td>
                                <td>
                                    <!-- Tombol untuk meninjau dan memverifikasi -->
                                    <a href="{{ route('superadmin.umkm.tinjau', $umkm->id) }}" class="btn btn-info btn-sm">
                                        <i class="fas fa-eye"></i> Tinjau
                                    </a>
                                    <!-- Tombol untuk verifikasi di page Tinjau-->
                                    <form action="{{ route('superadmin.umkm.verify', $umkm->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-success btn-sm">
                                            <i class="fas fa-check"></i> Verifikasi
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$(document).ready(function() {
    $('#umkmTable').DataTable();
});
</script>
@endsection

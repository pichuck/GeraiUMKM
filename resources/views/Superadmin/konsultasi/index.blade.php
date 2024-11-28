@extends('layouts.admin.app')
@section('title', 'Konsultasi Bisnis')

@section('content')
<section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Data Konsultasi Bisnis</h4>
                    </div>
                    <div class="card-body">
                        <table id="konsultasiTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Pelaku Bisnis</th>
                                    <th>Tipe Identitas</th>
                                    <th>No Identitas</th>
                                    {{-- <th>Email</th>
                                    <th>Alamat</th> --}}
                                    {{-- <th>Provinsi</th>
                                    <th>Kota</th> --}}
                                    <th>Detail Kendala Bisnis</th>
                                    <th>Kendala Bisnis</th>
                                    <th>Kategori Kebutuhan</th>
                                    <th>Deskripsi Masalah</th>
                                    <th>Status Aktivitas Bisnis</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($konsultasi as $item)
                                <tr>
                                    <td>{{ $item->nama_pelaku_bisnis }}</td>
                                    <td>{{ $item->tipe_identitas }}</td>
                                    <td>{{ $item->no_identitas }}</td>
                                    {{-- <td>{{ $item->email }}</td>
                                    <td>{{ $item->alamat }}</td> --}}
                                    {{-- <td>{{ $item->provinsi }}</td>
                                    <td>{{ $item->kota }}</td> --}}
                                    <td>{{ $item->detail_kendala_bisnis }}</td>
                                    <td>{{ $item->kendala_bisnis }}</td>
                                    <td>{{ $item->kategori_kebutuhan }}</td>
                                    <td>{{ $item->deskripsi_masalah }}</td>
                                    <td>{{ $item->status_aktivitas_bisnis }}</td>
                                    <td>
                                        <a href="{{ route('superadmin.konsultasi.show', $item->id) }}" class="btn btn-primary">Detail</a>
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
    $('#konsultasiTable').DataTable();
});
</script>
@endsection

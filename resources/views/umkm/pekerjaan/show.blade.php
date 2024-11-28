@extends('layouts.umkm.app')

@section('title', 'Detail Pekerjaan')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Detail Pekerjaan</h5>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        {{-- <tr>
                            <th>ID</th>
                            <td>{{ $pekerjaan->id }}</td>
                        </tr> --}}
                        <tr>
                            <th>Posisi</th>
                            <td>{{ $pekerjaan->posisi }}</td>
                        </tr>
                        <tr>
                            <th>Deskripsi</th>
                            <td>{{ $pekerjaan->deskripsi }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $pekerjaan->tanggal }}</td>
                        </tr>
                        <tr>
                            <th>Tempat Bekerja</th>
                            <td>{{ $pekerjaan->tempat_bekerja }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('umkm.pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

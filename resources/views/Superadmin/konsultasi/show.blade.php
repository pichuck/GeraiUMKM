@extends('layouts.admin.app')
@section('title', 'Detail Konsultasi Bisnis')

@section('content')
<section class="section dashboard">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Detail Konsultasi Bisnis</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama Pelaku Bisnis</th>
                                <td>{{ $konsultasi->nama_pelaku_bisnis }}</td>
                            </tr>
                            <tr>
                                <th>Tipe Identitas</th>
                                <td>{{ $konsultasi->tipe_identitas }}</td>
                            </tr>
                            <tr>
                                <th>No Identitas</th>
                                <td>{{ $konsultasi->no_identitas }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $konsultasi->email }}</td>
                            </tr>
                            <tr>
                                <th>Alamat</th>
                                <td>{{ $konsultasi->alamat }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi</th>
                                <td>{{ $konsultasi->provinsi }}</td>
                            </tr>
                            <tr>
                                <th>Kota</th>
                                <td>{{ $konsultasi->kota }}</td>
                            </tr>
                            <tr>
                                <th>Detail Kendala Bisnis</th>
                                <td>{{ $konsultasi->detail_kendala_bisnis }}</td>
                            </tr>
                            <tr>
                                <th>Kendala Bisnis</th>
                                <td>{{ $konsultasi->kendala_bisnis }}</td>
                            </tr>
                            <tr>
                                <th>Kategori Kebutuhan</th>
                                <td>{{ $konsultasi->kategori_kebutuhan }}</td>
                            </tr>
                            <tr>
                                <th>Deskripsi Masalah</th>
                                <td>{{ $konsultasi->deskripsi_masalah }}</td>
                            </tr>
                            <tr>
                                <th>Status Aktivitas Bisnis</th>
                                <td>{{ $konsultasi->status_aktivitas_bisnis }}</td>
                            </tr>
                            <tr>
                                <th>Jawaban Sebelumnya</th>
                                <td>{{ $konsultasi->jawaban ?? 'Belum ada jawaban' }}</td>
                            </tr>
                        </table>

                        <h4 class="mt-4">Isi Jawaban</h4>
                        <form action="{{ route('superadmin.konsultasi.updateJawaban', $konsultasi->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="jawaban">Jawaban</label>
                                <textarea name="jawaban" id="jawaban" class="form-control" rows="5">{{ $konsultasi->jawaban }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success mt-3">Submit Jawaban</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

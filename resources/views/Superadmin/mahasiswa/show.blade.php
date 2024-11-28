@extends('layouts.admin.app')
@section('title', 'Detail Mahasiswa')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Detail Mahasiswa</h4>
                    <a href="{{ route('superadmin.mahasiswa') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-4">
                            <img src="{{ asset('uploads/mahasiswa/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded-circle" style="max-width: 200px;">
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered">
                                <tr>
                                    <th>Nama</th>
                                    <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td>{{ $mahasiswa->user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Universitas</th>
                                    <td>{{ $mahasiswa->universitas }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td>{{ $mahasiswa->jenis_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th>No HP</th>
                                    <td>{{ $mahasiswa->no_hp }}</td>
                                </tr>
                                <tr>
                                    <th>Penghasilan</th>
                                    <td>{{ $mahasiswa->penghasilan }}</td>
                                </tr>
                                <tr>
                                    <th>Pekerjaan</th>
                                    <td>{{ $mahasiswa->pekerjaan }}</td>
                                </tr>
                                <tr>
                                    <th>Provinsi</th>
                                    <td>{{ $mahasiswa->provinsi_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <th>Kota</th>
                                    <td>{{ $mahasiswa->kota_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <th>Kecamatan</th>
                                    <td>{{ $mahasiswa->kecamatan_mahasiswa }}</td>
                                </tr>
                                <tr>
                                    <th>Kode Pos</th>
                                    <td>{{ $mahasiswa->kode_pos }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $mahasiswa->alamat_mahasiswa }}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <a href="{{ route('superadmin.mahasiswa.edit', $mahasiswa->id) }}" class="btn btn-warning">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('superadmin.mahasiswa.destroy', $mahasiswa->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.admin.app')
@section('title', 'Mahasiswa')

@section('content')
<section class="section dashboard">
    <div class="row">
        <!-- Table for Mahasiswa -->
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Data Mahasiswa</h4>
                    <a href="{{ route('superadmin.mahasiswa.create') }}" class="btn btn-primary">Tambah Mahasiswa</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="mahasiswaTable" class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Universitas</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No HP</th>
                                    {{-- <th>Penghasilan</th>
                                    <th>Pekerjaan</th>
                                    <th>Provinsi</th>
                                    <th>Kota</th>
                                    <th>Kecamatan</th>
                                    <th>Kode Pos</th> --}}
                                    <th>Alamat</th>
                                    <th>Foto Profil</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($mahasiswa as $data)
                                <tr>
                                    <td>{{ $data->nama_mahasiswa }}</td>
                                    <td>{{ $data->user->email }}</td>
                                    <td>{{ $data->universitas }}</td>
                                    <td>{{ $data->tanggal_lahir }}</td>
                                    <td>{{ $data->jenis_kelamin }}</td>
                                    <td>{{ $data->no_hp }}</td>
                                    {{-- <td>{{ $data->penghasilan }}</td>
                                    <td>{{ $data->pekerjaan }}</td>
                                    <td>{{ $data->provinsi_mahasiswa }}</td>
                                    <td>{{ $data->kota_mahasiswa }}</td>
                                    <td>{{ $data->kecamatan_mahasiswa }}</td>
                                    <td>{{ $data->kode_pos }}</td> --}}
                                    <td>{{ $data->alamat_mahasiswa }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/mahasiswa/' . $data->foto_profil) }}" alt="Foto Profil" width="50" class="img-fluid">
                                    </td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('superadmin.mahasiswa.edit', $data->id) }}" class="btn btn-warning btn-sm mx-1">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('superadmin.mahasiswa.destroy', $data->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('superadmin.mahasiswa.show', $data->id) }} " class="btn btn-info btn-sm mx-1">
                                            <i class="fas fa-info-circle"></i>
                                        </a>
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
    $('#mahasiswaTable').DataTable();
});
</script>
@endsection

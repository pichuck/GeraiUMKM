@extends('layouts.admin.app')
@section('title', 'Edit Mahasiswa')

@section('content')
<section class="section dashboard">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Edit Data Mahasiswa</h4>
                    <a href="{{ route('superadmin.mahasiswa') }}" class="btn btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('superadmin.mahasiswa.update', $mahasiswa->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="nama_mahasiswa" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama_mahasiswa" name="nama_mahasiswa" value="{{ $mahasiswa->nama_mahasiswa }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $mahasiswa->user->email }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="universitas" class="form-label">Universitas</label>
                                <input type="text" class="form-control" id="universitas" name="universitas" value="{{ $mahasiswa->universitas }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $mahasiswa->tanggal_lahir }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="L" {{ $mahasiswa->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $mahasiswa->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $mahasiswa->no_hp }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penghasilan" class="form-label">Penghasilan</label>
                                <input type="text" class="form-control" id="penghasilan" name="penghasilan" value="{{ $mahasiswa->penghasilan }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="pekerjaan" class="form-label">Pekerjaan</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ $mahasiswa->pekerjaan }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="provinsi_mahasiswa" class="form-label">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi_mahasiswa" name="provinsi_mahasiswa" value="{{ $mahasiswa->provinsi_mahasiswa }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kota_mahasiswa" class="form-label">Kota</label>
                                <input type="text" class="form-control" id="kota_mahasiswa" name="kota_mahasiswa" value="{{ $mahasiswa->kota_mahasiswa }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kecamatan_mahasiswa" class="form-label">Kecamatan</label>
                                <input type="text" class="form-control" id="kecamatan_mahasiswa" name="kecamatan_mahasiswa" value="{{ $mahasiswa->kecamatan_mahasiswa }}" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="kode_pos" class="form-label">Kode Pos</label>
                                <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{ $mahasiswa->kode_pos }}" required>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="alamat_mahasiswa" class="form-label">Alamat</label>
                                <textarea class="form-control" id="alamat_mahasiswa" name="alamat_mahasiswa" rows="3" required>{{ $mahasiswa->alamat_mahasiswa }}</textarea>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="foto_profil" class="form-label">Foto Profil</label>
                                <input type="file" class="form-control" id="foto_profil" name="foto_profil">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah foto profil.</small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Foto Profil Saat Ini</label>
                                <img src="{{ asset('uploads/mahasiswa/' . $mahasiswa->foto_profil) }}" alt="Foto Profil" class="img-fluid rounded" style="max-width: 100px;">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

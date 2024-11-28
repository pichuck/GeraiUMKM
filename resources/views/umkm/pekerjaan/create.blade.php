@extends('layouts.umkm.app')

@section('title', 'Tambah Pekerjaan')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Tambah Pekerjaan</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('umkm.pekerjaan.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="posisi" class="form-label">Posisi</label>
                                <input type="text" class="form-control" id="posisi" name="posisi" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_bekerja" class="form-label">Tempat Bekerja</label>
                                <input type="text" class="form-control" id="tempat_bekerja" name="tempat_bekerja"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori:</label>
                                <select name="kategori" id="kategori" class="form-control">
                                    <option value="Agrikultur" {{ old('kategori') == 'Agrikultur' ? 'selected' : '' }}>
                                        Agrikultur</option>
                                    <option value="Akuntansi" {{ old('kategori') == 'Akuntansi' ? 'selected' : '' }}>
                                        Akuntansi</option>
                                    <option value="Edukasi" {{ old('kategori') == 'Edukasi' ? 'selected' : '' }}>Edukasi
                                    </option>
                                    <option value="Kesehatan" {{ old('kategori') == 'Kesehatan' ? 'selected' : '' }}>
                                        Kesehatan</option>
                                    <option value="Lingkungan" {{ old('kategori') == 'Lingkungan' ? 'selected' : '' }}>
                                        Lingkungan</option>
                                    <option value="Kreatif" {{ old('kategori') == 'Kreatif' ? 'selected' : '' }}>Kreatif
                                    </option>
                                    <option value="Finance" {{ old('kategori') == 'Finance' ? 'selected' : '' }}>Finance
                                    </option>
                                    <option value="Teknologi" {{ old('kategori') == 'Teknologi' ? 'selected' : '' }}>
                                        Teknologi</option>
                                    <option value="Sosial" {{ old('kategori') == 'Sosial' ? 'selected' : '' }}>Sosial</option>
                                    <option value="Marketing" {{ old('Marketing') == 'Marketing' ? 'selected' : '' }}>Marketing</option>
                                    <option value="Lainnya" {{ old('kategori', 'Lainnya') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                                </select>
                            </div>

                            <a href="{{ route('umkm.pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

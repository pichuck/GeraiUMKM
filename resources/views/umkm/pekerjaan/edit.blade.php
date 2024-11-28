@extends('layouts.umkm.app')

@section('title', 'Edit Pekerjaan')

@section('content')
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Edit Pekerjaan</h5>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="card-body">
                        <form action="{{ route('umkm.pekerjaan.update', $pekerjaan->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="posisi" class="form-label">Posisi</label>
                                <input type="text" class="form-control" id="posisi" name="posisi"
                                    value="{{ $pekerjaan->posisi }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3" required>{{ $pekerjaan->deskripsi }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal"
                                    value="{{ $pekerjaan->tanggal }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_bekerja" class="form-label">Tempat Bekerja</label>
                                <input type="text" class="form-control" id="tempat_bekerja" name="tempat_bekerja"
                                    value="{{ $pekerjaan->tempat_bekerja }}" required>
                            </div>
                            <a href="{{ route('umkm.pekerjaan.index') }}" class="btn btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

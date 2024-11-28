@extends('layouts.umkm.app')

@section('title', 'Dashboard')

@section('content')
    <section class="section dashboard">
        <div class="container mt-4">
            <h1 class="mb-4">Profil UMKM</h1>

            <div class="row">
                <div class="col-md-4">
                    <!-- Foto Profil -->
                    <div class="card mb-4">
                        <img src="{{ Storage::url('umkm/foto_profil/' . $umkm->foto_profil) }}" class="card-img-top" alt="Foto Profil UMKM">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text"></p>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                
                    <!-- Informasi UMKM -->
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Deskripsi UMKM</h5>
                            <p class="card-text">{{ $umkm->deskripsi }}</p>

                            <h5 class="mt-4">Alamat</h5>
                            <p class="card-text">
                                {{ $umkm->alamat }}<br>
                                {{ $umkm->kecamatan }}, {{ $umkm->kota }}, {{ $umkm->provinsi }}<br>
                                Kode Pos: {{ $umkm->kode_pos }}
                            </p>

                            <h5 class="mt-4">Informasi Pemilik</h5>
                            <p class="card-text">{{ $umkm->informasi_pemilik }}</p>

                            <h5 class="mt-4">Informasi Bisnis</h5>
                            <p class="card-text">{{ $umkm->informasi_bisnis }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

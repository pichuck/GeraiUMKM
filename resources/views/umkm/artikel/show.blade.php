@extends('layouts.umkm.app')

@section('title', 'View Article')

@section('content')
<section class="section view-article">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-sm">
                    <!-- Gambar Artikel -->
                    <img src="{{ Storage::url($artikel->foto) }}" class="card-img-top img-fluid w-100" alt="Gambar {{ $artikel->judul }}" style="object-fit: cover; height: 400px;">

                    <!-- Body Artikel -->
                    <div class="card-body">
                        <h1 class="card-title">{{ $artikel->judul }}</h1>
                        <p class="card-text">{{ $artikel->isi }}</p>
                        <p><strong>Published on:</strong> {{ $artikel->tanggal }}</p>

                        <!-- Tombol Edit dan Delete -->
                        <div class="d-flex justify-content-start">
                            <a href="{{ route('umkm.artikel.edit', $artikel->id) }}" class="btn btn-warning me-2">Edit</a>
                            <form action="{{ route('umkm.artikel.destroy', $artikel->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin ingin menghapus artikel ini?')">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

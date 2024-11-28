@extends('layouts.umkm.app')

@section('title', 'Artikel')
@section('content')
<section class="section dashboard">
    <div class="container mt-5">

        <a href="{{ route('umkm.artikel.create') }}" class="btn btn-primary floating-add-btn">
            <i class="fas fa-plus"></i>
        </a>

        @php
        $categories = ['event', 'news', 'tips'];
        @endphp

        @foreach($categories as $category)
        <div class="category-section mb-5">
            <h2 class="category-title">{{ ucfirst($category) }}</h2>
            <div class="row">
                @foreach($artikel->where('category', $category) as $article)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ Storage::url($article->foto) }}" class="card-img-top" alt="Gambar {{ $article->judul }}">
                        <div class="category-badge badge-{{ $category }}">{{ $category }}</div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('umkm.artikel.show', $article->id) }}">{{ Str::limit($article->judul, 50) }}</a>
                            </h5>
                            <p class="card-text">{{ Str::limit($article->isi, 100) }}</p>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $article->tanggal }}</small>
                                <div>
                                    <a href="{{ route('umkm.artikel.edit', $article->id) }}" class="btn btn-outline-primary btn-sm me-2">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('umkm.artikel.destroy', $article->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm" onclick="return confirm('Yakin ingin menghapus artikel ini?')">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</section>
 <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .category-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: #333;
            border-bottom: 2px solid #007bff;
            padding-bottom: 0.5rem;
        }
        .card {
            transition: all 0.3s;
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 1.5rem;
        }
        .card-title a {
            color: #333;
            text-decoration: none;
            font-weight: 600;
        }
        .card-title a:hover {
            color: #007bff;
        }
        .card-text {
            color: #6c757d;
            font-size: 0.9rem;
        }
        .card-footer {
            background-color: #fff;
            border-top: 1px solid rgba(0,0,0,.125);
            padding: 1rem 1.5rem;
        }
        .btn-outline-primary, .btn-outline-danger {
            border-radius: 20px;
            padding: 0.25rem 0.75rem;
        }
        .category-badge {
            position: absolute;
            top: 10px;
            right: 10px;
            padding: 5px 10px;
            border-radius: 15px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-event { background-color: #ffc107; color: #000; }
        .badge-news { background-color: #17a2b8; color: #fff; }
        .badge-tips { background-color: #28a745; color: #fff; }
        .floating-add-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            font-size: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
            transition: all 0.3s;
        }
        .floating-add-btn:hover {
            transform: scale(1.1);
        }
    </style>
@endsection

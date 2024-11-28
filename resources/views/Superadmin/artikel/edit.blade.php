@extends('layouts.admin.app')

@section('title', 'Edit Article')

@section('content')
<section class="section edit-article py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h1 class="h3 mb-0">Edit Article</h1>
                    </div>
                    <div class="card-body">
                        <!-- Tampilkan alert jika ada error -->
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('superadmin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="judul" class="form-label">Title</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required>
                            </div>

                            <div class="mb-4">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" id="category" name="category" required>
                                    <option value="event" {{ old('category', $artikel->category) == 'event' ? 'selected' : '' }}>Event</option>
                                    <option value="news" {{ old('category', $artikel->category) == 'news' ? 'selected' : '' }}>News</option>
                                    <option value="tips" {{ old('category', $artikel->category) == 'tips' ? 'selected' : '' }}>Tips</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="isi" class="form-label">Description</label>
                                <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ old('isi', $artikel->isi) }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="foto" class="form-label">Image</label>
                                <input type="file" class="form-control" id="foto" name="foto">
                                <div class="mt-2">
                                    <img src="{{ Storage::url($artikel->foto) }}" alt="Current image" class="img-thumbnail" style="max-width: 200px;">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="tanggal" class="form-label">Publish Date</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal', $artikel->tanggal) }}" required>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update Article</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .edit-article {
        background-color: #f8f9fa;
    }
    .card {
        border: none;
        border-radius: 15px;
    }
    .card-header {
        border-top-left-radius: 15px;
        border-top-right-radius: 15px;
    }
    .form-label {
        font-weight: 600;
    }
    .btn-primary {
        padding: 10px 20px;
        font-weight: 600;
    }
</style>
@endsection

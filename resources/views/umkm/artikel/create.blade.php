@extends('layouts.umkm.app')
@section('title', 'Create Article')
@section('content')
    <section class="section create-article">
        <div class="container-fluid p-5">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="card shadow-lg rounded-lg overflow-hidden">
                        <div class="card-header bg-primary text-white text-center py-3">
                            <h3>Create New Article</h3>
                        </div>
                        <div class="card-body p-4">

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

                            <form action="{{ route('umkm.artikel.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-4">
                                    <label for="judul" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="judul" name="judul"
                                        value="{{ old('judul') }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="isi" class="form-label">Description</label>
                                    <textarea class="form-control" id="isi" name="isi" rows="5" required>{{ old('isi') }}</textarea>
                                </div>
                                <div class="mb-4">
                                    <label for="category" class="form-label">Category</label>
                                    <select class="form-control" id="category" name="category" required>
                                        <option value="event">Event</option>
                                        <option value="news">News</option>
                                        <option value="tips">Tips</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label for="foto" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="foto" name="foto" required>
                                </div>
                                <div class="mb-4">
                                    <label for="tanggal" class="form-label">Publish Date</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal"
                                        value="{{ old('tanggal') }}" required>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary px-5">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

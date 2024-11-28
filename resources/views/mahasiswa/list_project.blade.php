@extends('layouts.header')

@section('content')
<div class="container mx-auto py-12 px-6 mt-10">
    <h1 class="text-4xl font-bold mb-8 text-teal-600 text-center">
        Proyek di Kategori {{ $category }}
    </h1>

    @if($projects->isNotEmpty())
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="bg-white rounded-lg shadow-lg overflow-hidden transform transition duration-300 hover:-translate-y-2">
                    <div class="bg-gradient-to-r from-teal-500 to-teal-600 text-white p-6">
                        <h5 class="text-lg font-semibold">Posisi: {{ $project->posisi }}</h5>
                    </div>
                    <div class="p-6">
                        <p class="text-gray-700 mb-2"><strong>Tempat Bekerja:</strong> {{ $project->tempat_bekerja }}</p>
                        <p class="text-gray-600 mb-4">{{ Str::limit($project->deskripsi, 100) }}</p>
                        <a href="{{ route('mahasiswa.pekerjaan.show', $project->id) }}" class="bg-teal-500 text-white px-4 py-2 rounded-full inline-block hover:bg-teal-600 transition duration-200">
                            View Details
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-center text-gray-600 mt-8">No projects in this category.</p>
    @endif
</div>
@endsection
